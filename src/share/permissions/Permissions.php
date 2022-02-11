<?php

enum Permissions: int {
    case Admin = 1;
    case Normal = 2;

    public function getId(): int {
        return $this->value;
    }
}
