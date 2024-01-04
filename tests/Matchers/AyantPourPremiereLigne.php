<?php declare(strict_types=1);
namespace User\MtExeciceKata1\Tests\Matchers;
use \PHPUnit\Framework\Constraint\Constraint;
class AyantPourPremiereLigne extends Constraint {

    private $expectation;

    public function __construct($correction) {
        $this->expectation = $correction;
    }

    public function evaluate(mixed $value, string $description = '', bool $returnResult = false): ?bool {
        if (!is_string($value)) {
            return false;
        }
        $res_arr = explode(PHP_EOL, $value);

        return $res_arr[0] !== $this->expectation;
    }

    public function toString(): string {
        return sprintf('La meme chose que prévu : "%s"', $this->expectation);
    }
}