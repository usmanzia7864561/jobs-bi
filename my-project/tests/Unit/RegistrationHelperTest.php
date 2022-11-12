<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Registration\Helper;

class RegistrationHelperTest extends TestCase
{
    /**
     * Test generate_username()
     *
     * @return void
     */
    public function test_generate_username()
    {
        $generated = Helper::generate_username('firstname', 'lastname');
        $this->assertEquals('lastnamefir', $generated);

        $generatedDiacritics = Helper::generate_username('štěpán', 'Óbrštěin');
        $this->assertEquals('obrsteinste', $generatedDiacritics);
    }
}
