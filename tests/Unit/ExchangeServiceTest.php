<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Services\ExchangeService;

/**
 * Class ExchangeServiceTest
 * @package Tests\Unit
 */
class ExchangeServiceTest extends TestCase
{
    private $exchangeService;
    /**
     *
     */
    public function setUp()
    {
        // テストが走る前に実行したい処理をかく
        parent::setUp();

        $this->exchangeService = new ExchangeService();
    }

    /**
     *
     */
    public function tearDown()
    {
        // テストが走った後に実行したい処理をかく
        parent::tearDown();
    }

    /**
     * @test
     * @param $inputUsd
     * @param $returnUsd
     * @dataProvider dataprovider
     */
    public function testViewFrontPages($inputUsd, $returnUsd)
    {
//        $exchangeService = new ExchangeService();

        $usd = $this->exchangeService->getUsd($inputUsd);
        $this->assertSame($returnUsd, $usd);
    }

    /**
     * データプロバイダ
     *
     * @return array
     */
    public function dataprovider()
    {
        $return['USDが0以下の場合、0'] = [-1, 0];
        $return['USDが小数点第3位以下まである場合、0'] = [1.111, 0];
        $return['USDが整数の場合'] = [1, 1];
        $return['USDが0の場合'] = [0, 0];
        $return['USDが小数点第2位までの場合'] = [1.1, 1.1];
        $return['USDが小数点第2位までの場合'] = [1.11, 1.11];

        return $return;
    }

}
