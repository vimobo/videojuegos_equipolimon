<?php

namespace Lib;

class Pages {
    private const string VIEWS_DIR = __DIR__ . '/../View/';

    public function render(string $pageName, ?array $params= null): void {
        if ($params != null) {
            foreach($params as $name => $value)
                $$name = $value;
        }

        require self::VIEWS_DIR . 'header.php';
        require self::VIEWS_DIR . $pageName . '.php';
        require self::VIEWS_DIR . 'footer.php';
    }
}
?>