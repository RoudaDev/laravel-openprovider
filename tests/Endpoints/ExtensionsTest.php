<?php

namespace rouda\OpenProvider\Tests\Endpoints;

class ExtensionsTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_do_a_retrieve_extension_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><name>co.uk</name><minPeriod>2</minPeriod><maxPeriod>10</maxPeriod><transferAvailable>1</transferAvailable><tradeAvailable>0</tradeAvailable><isTransferAuthCodeRequired>no</isTransferAuthCodeRequired><isTradeAuthCodeRequired>no</isTradeAuthCodeRequired><isAuthCodeRequested>0</isAuthCodeRequested><isAuthCodeAvailable>0</isAuthCodeAvailable><isAuthCodeChangeable>0</isAuthCodeChangeable><isPrivateWhoisAllowed>0</isPrivateWhoisAllowed><domicileAvailable>0</domicileAvailable><quarantinePeriod>0</quarantinePeriod><dnssecAllowed>0</dnssecAllowed><dnssecAlgorithms><array><item>3</item><item>5</item><item>6</item><item>7</item><item>8</item><item>10</item><item>12</item><item>13</item></array></dnssecAlgorithms><status>ACT</status><supportedApplicationMode /><billingHandleEnabled>0</billingHandleEnabled><resellerHandleEnabled>0</resellerHandleEnabled><supportedIdnScripts /><prices><minPeriod>2</minPeriod><maxPeriod>10</maxPeriod><setupPrice><product><price>0.00</price><currency>GBP</currency></product><reseller><price>0.00</price><currency>EUR</currency></reseller></setupPrice><domicilePrice><product><price>0.00</price><currency>GBP</currency></product><reseller><price>0.00</price><currency>EUR</currency></reseller></domicilePrice><createPrice><product><price>3.95</price><currency>GBP</currency></product><reseller><price>5.65</price><currency>EUR</currency></reseller></createPrice><resellerPrice><product><price>3.95</price><currency>GBP</currency></product><reseller><price>5.65</price><currency>EUR</currency></reseller></resellerPrice><renewPrice><product><price>3.95</price><currency>GBP</currency></product><reseller><price>5.65</price><currency>EUR</currency></reseller></renewPrice><transferPrice><product><price>0.00</price><currency>GBP</currency></product><reseller><price>0.00</price><currency>EUR</currency></reseller></transferPrice><restorePrice><product><price>0.00</price><currency>GBP</currency></product><reseller><price>0.00</price><currency>EUR</currency></reseller></restorePrice><softRestorePrice><product><price>0.00</price><currency>GBP</currency></product><reseller><price>0.00</price><currency>EUR</currency></reseller></softRestorePrice><updatePrice><product><price>0.00</price><currency>GBP</currency></product><reseller><price>0.00</price><currency>EUR</currency></reseller></updatePrice></prices></data></reply></openXML>'));

        $extension = $this->openProvider->extensions()->retrieveExtension([
            'withPrice' => 1,
            'withDescription' => 0,
            'name' => 'co.uk',
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['name' => 'co.uk', 'minPeriod' => '2', 'maxPeriod' => '10', 'transferAvailable' => '1', 'tradeAvailable' => '0', 'isTransferAuthCodeRequired' => 'no', 'isTradeAuthCodeRequired' => 'no', 'isAuthCodeRequested' => '0', 'isAuthCodeAvailable' => '0', 'isAuthCodeChangeable' => '0', 'isPrivateWhoisAllowed' => '0', 'domicileAvailable' => '0', 'quarantinePeriod' => '0', 'dnssecAllowed' => '0', 'dnssecAlgorithms' => ['array' => ['item' => [0 => '3', 1 => '5', 2 => '6', 3 => '7', 4 => '8', 5 => '10', 6 => '12', 7 => '13']]], 'status' => 'ACT', 'supportedApplicationMode' => [], 'billingHandleEnabled' => '0', 'resellerHandleEnabled' => '0', 'supportedIdnScripts' => [], 'prices' => ['minPeriod' => '2', 'maxPeriod' => '10', 'setupPrice' => ['product' => ['price' => '0.00', 'currency' => 'GBP'], 'reseller' => ['price' => '0.00', 'currency' => 'EUR']], 'domicilePrice' => ['product' => ['price' => '0.00', 'currency' => 'GBP'], 'reseller' => ['price' => '0.00', 'currency' => 'EUR']], 'createPrice' => ['product' => ['price' => '3.95', 'currency' => 'GBP'], 'reseller' => ['price' => '5.65', 'currency' => 'EUR']], 'resellerPrice' => ['product' => ['price' => '3.95', 'currency' => 'GBP'], 'reseller' => ['price' => '5.65', 'currency' => 'EUR']], 'renewPrice' => ['product' => ['price' => '3.95', 'currency' => 'GBP'], 'reseller' => ['price' => '5.65', 'currency' => 'EUR']], 'transferPrice' => ['product' => ['price' => '0.00', 'currency' => 'GBP'], 'reseller' => ['price' => '0.00', 'currency' => 'EUR']], 'restorePrice' => ['product' => ['price' => '0.00', 'currency' => 'GBP'], 'reseller' => ['price' => '0.00', 'currency' => 'EUR']], 'softRestorePrice' => ['product' => ['price' => '0.00', 'currency' => 'GBP'], 'reseller' => ['price' => '0.00', 'currency' => 'EUR']], 'updatePrice' => ['product' => ['price' => '0.00', 'currency' => 'GBP'], 'reseller' => ['price' => '0.00', 'currency' => 'EUR']]]]]], $extension);
    }

    /** @test */
    public function it_can_do_a_search_extension_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><results><array><item><name>ac</name><transferAvailable>0</transferAvailable><isTransferAuthCodeRequired>0</isTransferAuthCodeRequired><domicileAvailable>0</domicileAvailable></item><item><name>ae</name><transferAvailable>1</transferAvailable><isTransferAuthCodeRequired>1</isTransferAuthCodeRequired><domicileAvailable>0</domicileAvailable></item><item><name>ag</name><transferAvailable>0</transferAvailable><isTransferAuthCodeRequired>1</isTransferAuthCodeRequired><domicileAvailable>0</domicileAvailable></item></array></results><total>117</total></data></reply></openXML>'));

        $extensions = $this->openProvider->extensions()->searchExtension([
            'withUsageCount' => true
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['results' => ['array' => ['item' => [0 => ['name' => 'ac', 'transferAvailable' => '0', 'isTransferAuthCodeRequired' => '0', 'domicileAvailable' => '0'], 1 => ['name' => 'ae', 'transferAvailable' => '1', 'isTransferAuthCodeRequired' => '1', 'domicileAvailable' => '0'], 2 => ['name' => 'ag', 'transferAvailable' => '0', 'isTransferAuthCodeRequired' => '1', 'domicileAvailable' => '0']]]], 'total' => '117']]], $extensions);
    }
}
