<?php

namespace LaraDumps\LaraDumps\Payloads;

use LaraDumps\LaraDumps\Actions\Config;
use LaraDumps\LaraDumpsCore\Concerns\WithEditors;
use LaraDumps\LaraDumpsCore\Payloads\Payload;

class InstallationPayload extends Payload
{
    use WithEditors;

    public function __construct(
        public ?string $appName = null
    ) {
    }

    public function type(): string
    {
        return 'install';
    }

    public function content(): array
    {
        return [
            'name'        => $this->appName,
            'environment' => Config::getAvailableConfig(),
            'env_path'    => rtrim(strval(getcwd()), '\/') . DIRECTORY_SEPARATOR . '.env',
            'ide_list'    => $this->editors,
        ];
    }
}
