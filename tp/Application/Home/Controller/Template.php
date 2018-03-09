<?php

namespace framework;

class Template
{
	//模板文件路径
	protected $tplPath;
	//缓存文件路径
	protected $cachePath;
	protected $vars;
	protected $validTime;

	public function __construct($tplPath='./view/', $cachePath='./cache/template/', $validTime=3600)
	{
		//初始化成员属性
		$this->tplPath = $this->checkPath($tplPath);
		$this->cachePath = $this->checkPath($cachePath);
	}
	//检查目录
	protected function checkPath($dir)
	{
		if (!is_dir($dir)) {
			mkdir($dir, 0777, true);
		}
		if (!is_writeable($dir) || !is_readable($dir)) {
			chmod($dir, 0777);
		}
		return $dir;
	}
	//分配变量
	public function assign($name, $value)
	{
		$this->vars[$name] = $value;
	}

	public function display($tplFile, $flag=true)
	{
		//拼接缓存文件路径
		$cacheFile = $this->getCacheFile($tplFile); // 1.html  1_html.php
		//拼接模板文件全路径
		$tplFile = rtrim($this->tplPath, '/') .'/'. $tplFile;
		if (!file_exists($tplFile)) {
			exit($tplFile . '模板文件不存在');
		}
		//写入缓存文件
		//当缓存文件不存在 缓存文件修改时间 < 模板文件修改时间  缓存文件修改时间 + 3600  < time()
		if (!file_exists($cacheFile) || filemtime($cacheFile) < filemtime($tplFile) || (filemtime($cacheFile) + $this->validTime) < time()) {
			//进行编译
			$con = $this->compile($tplFile);
			//$cacheFile   cache/index/index/index_html.php
			$this->checkPath(dirname($cacheFile));
			file_put_contents($cacheFile, $con);
		}
		
		//判断如果发送了变量 就导入
		if (!empty($this->vars)) {
			extract($this->vars);
		}

		if ($flag) {
			include $cacheFile;
		} else {
			return $cacheFile;
		}
	}

	protected function getCacheFile($tplFile)
	{
		return rtrim($this->cachePath, '/') . '/' . str_replace('.', '_', $tplFile) . '.php';
	}

	protected function compile($tplFile)
	{
		//将模板文件内容读取到字符串中
		$content = file_get_contents($tplFile);
		//自定义规则数组
		$keys = [
			'{__%%__}'      => '<?=\1;?>',
			'{%%++}'		=> '<?php \1++; ?>',
			'{$%%}'			=> '<?=$\1; ?>',
			'{if %%}'		=> '<?php if (\1):?>',
			'{/if}'			=> '<?php endif; ?>',
			'{elseif %%}'	=> '<?php elseif (\1): ?>',
			'{else if %%}'	=> '<?php elseif (\1): ?>',
			'{foreach %%}'	=> '<?php foreach (\1): ?>',
			'{/foreach}'	=> '<?php endforeach; ?>',
			'{while %%}'	=>	'<?php while (\1): ?>',
			'{/while}'		=>	'<?php endwhile;?>',
			'{continue}'	=>	'<?php continue; ?>',
			'{break}'		=>	'<?php break; ?>',
			'{include %%}'	=>	'这是偏你的',
		];
		foreach ($keys as $key => $value) {
			$key = preg_quote($key, '#');
			$reg = '#'. str_replace('%%', '(.+)', $key) .'#U';
			if (stripos($key, 'include')) {
				//当遍历到include的时候 需要把include 包含的文件 也进行替换
				$content = preg_replace_callback($reg, [$this, 'dealInclude'], $content);
			} else {
				//不是include  直接替换
				$content = preg_replace($reg, $value, $content);
			}
		}
		return $content;
	}

	protected function dealInclude($match)
	{
		//取到文件名字 zaici display   index.html  include 1.html
		//$this->display($match[1], false);
		$cacheFile = $this->display($match[1], false);
		//$this->checkPath(dirname($cacheFile));
		return "<?php include '$cacheFile'; ?>";
	}

	public function clearCache()
	{
		$this->clearDir($this->cachePath);
	}

	protected function clearDir($dir)
	{
		$dir = rtrim($dir, '/') . '/';
		$dp = opendir($dir);
		while ($file = readdir($dp)) {
			if ($file == '.' || $file == '..') {
				continue;
			}
			$fileName = $dir . $file;
			if (is_dir($fileName)) {
				$this->clearDir($fileName);
			} else {
				unlink($fileName);
			}
		}
		closedir($dp);
		rmdir($dir);
	}
}