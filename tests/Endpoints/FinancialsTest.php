<?php

namespace rouda\OpenProvider\Tests\Endpoints;

class FinancialsTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_do_a_search_invoice_reseller_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data><results><array><item><creationDate>2010-01-31 00:00:00</creationDate><invoiceNumber>OP123482</invoiceNumber><amount><product><price>259.90</price><currency>EUR</currency></product><reseller><price>259.90</price><currency>EUR</currency></reseller></amount><invoiceUrl>http://rest.openprovider.eu/invoice/OP123482?token=</invoiceUrl><attachmentUrl>http://rest.openprovider.eu/attachment/OP123482?token=</attachmentUrl></item><item><creationDate>2010-02-28 00:00:00</creationDate><invoiceNumber>OP123483</invoiceNumber><amount><product><price>204.20</price><currency>EUR</currency></product><reseller><price>204.20</price><currency>EUR</currency></reseller></amount><invoiceUrl>http://rest.openprovider.eu/invoice/OP123483?token=</invoiceUrl><attachmentUrl>http://rest.openprovider.eu/attachment/OP123483?token=</attachmentUrl></item><item><creationDate>2010-03-31 00:00:00</creationDate><invoiceNumber>OP123484</invoiceNumber><amount><product><price>225.92</price><currency>EUR</currency></product><reseller><price>225.92</price><currency>EUR</currency></reseller></amount><invoiceUrl>http://rest.openprovider.eu/invoice/OP123484?token=</invoiceUrl><attachmentUrl>http://rest.openprovider.eu/attachment/OP123484?token=</attachmentUrl></item></array></results><total>3</total></data></reply></openXML>'));

        $financials = $this->openProvider->financials()->searchInvoiceReseller([
            'startCreationDate' => '2010-01-01',
            'endCreationDate' => '2010-03-31'
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['results' => ['array' => ['item' => [0 => ['creationDate' => '2010-01-31 00:00:00', 'invoiceNumber' => 'OP123482', 'amount' => ['product' => ['price' => '259.90', 'currency' => 'EUR'], 'reseller' => ['price' => '259.90', 'currency' => 'EUR']], 'invoiceUrl' => 'http://rest.openprovider.eu/invoice/OP123482?token=', 'attachmentUrl' => 'http://rest.openprovider.eu/attachment/OP123482?token='], 1 => ['creationDate' => '2010-02-28 00:00:00', 'invoiceNumber' => 'OP123483', 'amount' => ['product' => ['price' => '204.20', 'currency' => 'EUR'], 'reseller' => ['price' => '204.20', 'currency' => 'EUR']], 'invoiceUrl' => 'http://rest.openprovider.eu/invoice/OP123483?token=', 'attachmentUrl' => 'http://rest.openprovider.eu/attachment/OP123483?token='], 2 => ['creationDate' => '2010-03-31 00:00:00', 'invoiceNumber' => 'OP123484', 'amount' => ['product' => ['price' => '225.92', 'currency' => 'EUR'], 'reseller' => ['price' => '225.92', 'currency' => 'EUR']], 'invoiceUrl' => 'http://rest.openprovider.eu/invoice/OP123484?token=', 'attachmentUrl' => 'http://rest.openprovider.eu/attachment/OP123484?token=']]]], 'total' => '3']]], $financials);
    }

    /** @test */
    public function it_can_do_a_search_payment_reseller_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data><results><array><item><id>50320</id><type>online</type><creationDate>2010-01-06 10:43:43</creationDate><amount><product><price>100.00</price><currency>EUR</currency></product><reseller><price>100.00</price><currency>EUR</currency></reseller></amount><paymentDate>2010-01-07 09:27:29</paymentDate><confirmationDate>2010-01-06 10:45:46</confirmationDate><isProcessed>1</isProcessed><status>processed</status></item><item><id>50540</id><type>online</type><creationDate>2010-01-11 08:38:29</creationDate><amount><product><price>100.00</price><currency>EUR</currency></product><reseller><price>100.00</price><currency>EUR</currency></reseller></amount><paymentDate>2010-01-12 09:26:03</paymentDate><confirmationDate>2010-01-11 08:40:53</confirmationDate><isProcessed>1</isProcessed><status>processed</status></item><item><id>51831</id><type>online</type><creationDate>2010-02-09 10:22:29</creationDate><amount><product><price>500.00</price><currency>EUR</currency></product><reseller><price>500.00</price><currency>EUR</currency></reseller></amount><paymentDate>2010-02-10 10:08:49</paymentDate><confirmationDate>2010-02-09 10:26:11</confirmationDate><isProcessed>1</isProcessed><status>processed</status></item><item><id>54036</id><type>online</type><creationDate>2010-03-29 15:50:02</creationDate><amount><product><price>350.00</price><currency>EUR</currency></product><reseller><price>350.00</price><currency>EUR</currency></reseller></amount><paymentDate>2010-03-31 10:05:28</paymentDate><confirmationDate>2010-03-29 15:52:51</confirmationDate><isProcessed>1</isProcessed><status>processed</status></item></array></results><total>4</total></data></reply></openXML>'));

        $financials = $this->openProvider->financials()->searchPaymentReseller([
            'type' => 'online',
            'status' => 'processed',
            'startCreationDate' => '2010-01-01',
            'endCreationDate' => '2010-03-31'
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['results' => ['array' => ['item' => [0 => ['id' => '50320', 'type' => 'online', 'creationDate' => '2010-01-06 10:43:43', 'amount' => ['product' => ['price' => '100.00', 'currency' => 'EUR'], 'reseller' => ['price' => '100.00', 'currency' => 'EUR']], 'paymentDate' => '2010-01-07 09:27:29', 'confirmationDate' => '2010-01-06 10:45:46', 'isProcessed' => '1', 'status' => 'processed'], 1 => ['id' => '50540', 'type' => 'online', 'creationDate' => '2010-01-11 08:38:29', 'amount' => ['product' => ['price' => '100.00', 'currency' => 'EUR'], 'reseller' => ['price' => '100.00', 'currency' => 'EUR']], 'paymentDate' => '2010-01-12 09:26:03', 'confirmationDate' => '2010-01-11 08:40:53', 'isProcessed' => '1', 'status' => 'processed'], 2 => ['id' => '51831', 'type' => 'online', 'creationDate' => '2010-02-09 10:22:29', 'amount' => ['product' => ['price' => '500.00', 'currency' => 'EUR'], 'reseller' => ['price' => '500.00', 'currency' => 'EUR']], 'paymentDate' => '2010-02-10 10:08:49', 'confirmationDate' => '2010-02-09 10:26:11', 'isProcessed' => '1', 'status' => 'processed'], 3 => ['id' => '54036', 'type' => 'online', 'creationDate' => '2010-03-29 15:50:02', 'amount' => ['product' => ['price' => '350.00', 'currency' => 'EUR'], 'reseller' => ['price' => '350.00', 'currency' => 'EUR']], 'paymentDate' => '2010-03-31 10:05:28', 'confirmationDate' => '2010-03-29 15:52:51', 'isProcessed' => '1', 'status' => 'processed']]]], 'total' => '4']]], $financials);
    }

    /** @test */
    public function it_can_do_a_search_transaction_reseller_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data><results><array><item><type>transaction</type><creationDate>2010-12-01 23:02:29</creationDate><action>RENEW</action><subject>domain-database.com</subject><quantity>1</quantity><setup><product><price>0.00</price><currency>USD</currency></product><reseller><price>0.00</price><currency>EUR</currency></reseller></setup><price><product><price>12.95</price><currency>USD</currency></product><reseller><price>9.76</price><currency>EUR</currency></reseller></price><discount>30.89</discount><vat>19</vat><total><product><price>10.65</price><currency>USD</currency></product><reseller><price>8.03</price><currency>EUR</currency></reseller></total></item><item><type>transaction</type><creationDate>2010-12-02 15:15:03</creationDate><action>NEW</action><subject>domain-gaming.com</subject><quantity>1</quantity><setup><product><price>0.00</price><currency>USD</currency></product><reseller><price>0.00</price><currency>EUR</currency></reseller></setup><price><product><price>12.95</price><currency>USD</currency></product><reseller><price>9.68</price><currency>EUR</currency></reseller></price><discount>30.89</discount><vat>19</vat><total><product><price>10.65</price><currency>USD</currency></product><reseller><price>7.96</price><currency>EUR</currency></reseller></total></item></array></results><total>42</total></data></reply></openXML>'));

        $financials = $this->openProvider->financials()->searchTransactionReseller([
            'limit' => 2,
            'startCreationDate' => '2010-12-01',
            'endCreationDate' => '2010-12-31'
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['results' => ['array' => ['item' => [0 => ['type' => 'transaction', 'creationDate' => '2010-12-01 23:02:29', 'action' => 'RENEW', 'subject' => 'domain-database.com', 'quantity' => '1', 'setup' => ['product' => ['price' => '0.00', 'currency' => 'USD'], 'reseller' => ['price' => '0.00', 'currency' => 'EUR']], 'price' => ['product' => ['price' => '12.95', 'currency' => 'USD'], 'reseller' => ['price' => '9.76', 'currency' => 'EUR']], 'discount' => '30.89', 'vat' => '19', 'total' => ['product' => ['price' => '10.65', 'currency' => 'USD'], 'reseller' => ['price' => '8.03', 'currency' => 'EUR']]], 1 => ['type' => 'transaction', 'creationDate' => '2010-12-02 15:15:03', 'action' => 'NEW', 'subject' => 'domain-gaming.com', 'quantity' => '1', 'setup' => ['product' => ['price' => '0.00', 'currency' => 'USD'], 'reseller' => ['price' => '0.00', 'currency' => 'EUR']], 'price' => ['product' => ['price' => '12.95', 'currency' => 'USD'], 'reseller' => ['price' => '9.68', 'currency' => 'EUR']], 'discount' => '30.89', 'vat' => '19', 'total' => ['product' => ['price' => '10.65', 'currency' => 'USD'], 'reseller' => ['price' => '7.96', 'currency' => 'EUR']]]]]], 'total' => '42']]], $financials);
    }
}
