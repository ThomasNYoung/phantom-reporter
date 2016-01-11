<?php
 
use Illuminate\Contracts\Filesystem\Filesystem;
 
class PDFWriter
{
    /**
     * @var Filesystem
     */
    private $storage;
 
    /**
     * @param Filesystem $storage
     */
    public function __construct(Filesystem $storage)
    {
        $this->storage = $storage;
    }
 
    /**
     * Write the PDF
     *
     * @param string $template
     * @param array $data
     * @return string
     */
    public function write($template, array $data)
    {
        $filename = sprintf('export-%s.pdf', time());
 
        $this->storage->put($filename, view($template, $data));
 
        $path = storage_path(sprintf('app/%s', $filename));
 
        $phantom = base_path('bin/phantom/phantomjs');
        $config  = base_path('bin/phantom/config.js');
        $command = sprintf('%s —ssl-protocol=any %s %s', $phantom, $config, $path);
        $process = (new Process($command, __DIR__))->setTimeout(10)->mustRun();
 
        return $path;
    }
}