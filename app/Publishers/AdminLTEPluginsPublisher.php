<?php

namespace App\Publishers;

use DomainException;
use CodeIgniter\Publisher\Publisher;

class AdminLTEPluginsPublisher extends Publisher
{
    /**
     * Tell Publisher where to get the files.
     * Since we will use Composer to download
     * them we point to the "vendor" directory.
     *
     * @var string
     */
    protected $source = 'almasaeed2010/adminlte/plugins/';

    /**
     * FCPATH is always the default destination,
     * but we may want them to go in a sub-folder
     * to keep things organized.
     *
     * @var string
     */
    protected $destination = 'assets/plugins';

    /**
     * Set the real destination.
     */
    public function __construct(?string $source = null, ?string $destination = null)
    {
        if ($this->source === '') {
            throw new DomainException('Invalid relative source path.');
        }
        if ($this->destination === '') {
            throw new DomainException('Invalid relative destination path.');
        }

        $this->source      = dirname(COMPOSER_PATH) . '/' . ltrim($this->source, '\\/');
        $this->destination = FCPATH . ltrim($this->destination, '\\/');

        if (! is_dir($this->destination)) {
            mkdir($this->destination, 0775, true);
        }

        parent::__construct($source, $destination);
    }

    /**
     * Use the "publish" method to indicate that this
     * class is ready to be discovered and automated.
     */
    public function publish(): bool
    {
        return $this
            // Add all the files relative to $source
             ->addPath('/')

            // Indicate we only want the minimized versions
            // ->retainPattern('*.min.*')

            // Merge-and-replace to retain the original directory structure
            ->merge(true);
    }

}