<?php

declare(strict_types=1);

namespace Conquest\Core\Concerns;

use Illuminate\Filesystem\Filesystem;

use function Laravel\Prompts\confirm;

trait ManipulatesFiles
{
    /**
     * @param  array<string>|string  $paths
     */
    protected function checkForCollision(array|string $paths): bool
    {
        $paths = is_string($paths) ? [$paths] : $paths;
        foreach ($paths as $path) {
            if (! $this->fileExists($path)) {
                continue;
            }

            if (! confirm(sprintf('[%s] already exists, do you want to overwrite it?', basename($path)))) {
                $this->components->error("{$path} already exists, aborting.");

                return true;
            }

            unlink($path);
        }

        return false;
    }

    /**
     * @param  array<string, string>  $replacements
     */
    protected function copyStubToApp(string $stub, string $targetPath, string $before, array $replacements = []): void
    {
        $filesystem = app(Filesystem::class);

        if (! $this->fileExists($stubPath = base_path("stubs/{$stub}.stub"))) {
            $stubPath = $this->getDefaultStubPath()."/{$stub}.stub";
        }

        $stub = str($filesystem->get($stubPath));

        foreach ($replacements as $key => $replacement) {
            $stub = $stub->replace(["{{ {$key} }}", "{{{$key}}}"], $replacement);
        }

        $stub = (string) $stub;

        $this->writeFile($targetPath, $stub);
    }

    protected function fileExists(string $path): bool
    {
        $filesystem = app(Filesystem::class);

        return $filesystem->exists($path);
    }

    protected function writeFile(string $path, string $contents): void
    {
        $filesystem = app(Filesystem::class);

        $filesystem->ensureDirectoryExists(
            pathinfo($path, PATHINFO_DIRNAME),
        );
        $filesystem->put($path, $contents);
    }
}
