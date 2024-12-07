<?php

namespace App\Interfaces\Credilus;

interface CredilusInterface
{
    public function searchByCpf(string $cpf);
    public function searchByCpfUnprivileged(string $cpf);
    public function searchByPhone(string $phone);
    public function searchByName(array $parameters);
    public function searchByAddress(array $parameters);
    public function searchByRelative(array $parameters);
    public function searchByEmail(array $parameters);
}
