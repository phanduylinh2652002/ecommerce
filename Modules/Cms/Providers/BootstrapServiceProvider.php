<?php

namespace Modules\Cms\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class BootstrapServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register(): void
    {
        // Service
        $this->bindClasses(
            base_path('Modules/Cms/app/Contracts/Services'),
            'Modules\Cms\app\Contracts\Services',
            base_path('Modules/Cms/app/Services'),
            'Modules\Cms\app\Services'
        );

        // Repository
        $this->bindClasses(
            base_path('Modules/Cms/app/Contracts/Repositories'),
            'Modules\Cms\app\Contracts\Repositories',
            base_path('Modules/Cms/app/Repositories'),
            'Modules\Cms\app\Repositories'
        );
    }

    /**
     * @param string $interfaceDirectory
     * @param string $interfaceNamespace
     * @param string $implementationDirectory
     * @param string $implementationNamespace
     * @return void
     */
    protected function bindClasses(
        string $interfaceDirectory,
        string $interfaceNamespace,
        string $implementationDirectory,
        string $implementationNamespace
    ): void {
        $interfaces = $this->getClassesInDirectory($interfaceDirectory, $interfaceNamespace);
        $implementations = $this->getClassesInDirectory($implementationDirectory, $implementationNamespace);

        foreach ($interfaces as $interface) {
            $implementation = Str::replace($interfaceNamespace, $implementationNamespace, $interface) . 'Impl';

            if (in_array($implementation, $implementations, true)) {
                $this->app->bind($interface, $implementation);
            }
        }
    }
    /**
     * Get all classes in a specific directory.
     *
     * @param string $directory
     * @param string $baseNamespace
     * @return array
     */
    protected function getClassesInDirectory(string $directory, string $baseNamespace): array
    {
        if (!File::isDirectory($directory)) {
            return [];
        }

        $classes = [];
        $files = File::allFiles($directory);

        foreach ($files as $file) {
            if ('php' === $file->getExtension()) {
                $class = $this->getClassFromFile($file->getRealPath(), $baseNamespace);

                if ($class) {
                    $classes[] = $class;
                }
            }
        }

        return $classes;
    }

    /**
     * Get the class name from a file.
     *
     * @param string $file
     * @param string $baseNamespace
     * @return string|null
     */
    private function getClassFromFile(string $file, string $baseNamespace): ?string
    {
        $contents = File::get($file);
        $className = $this->getClassNameFromFile($contents);

        if ($className) {
            return $baseNamespace . '\\' . $className;
        }

        return null;
    }

    /**
     * Get the class name from file contents.
     *
     * @param string $contents
     * @return string|null
     */
    private function getClassNameFromFile(string $contents): ?string
    {
        if (preg_match('/interface\s+(\w+)/', $contents, $matches)) {
            return $matches[1];
        }

        if (preg_match('/class\s+(\w+)/', $contents, $matches)) {
            return $matches[1];
        }

        return null;
    }
}