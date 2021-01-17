<?php

namespace BogdanKovachev\Borica\Response;

use BogdanKovachev\Borica\Borica;
use BogdanKovachev\Borica\TransactionType;

/**
 * @author Bogdan Kovachev (https://1337.bg)
 */
class Response {

    /**
     * Fields used for generating message authentication code (MAC)
     */
    const MAC_FIELDS = [
        TransactionType::SALE => [
            'TERMINAL',
            'TRTYPE',
            'AMOUNT',
            'TIMESTAMP'
        ],
        TransactionType::DEFERRED_AUTHORIZATION => [
            'TERMINAL',
            'TRTYPE',
            'AMOUNT',
            'ORDER',
            'TIMESTAMP'
        ],
        TransactionType::COMPLETE_DEFERRED_AUTHORIZATION => [
            'TERMINAL',
            'TRTYPE',
            'AMOUNT',
            'ORDER',
            'TIMESTAMP'
        ],
        TransactionType::REVERSE_DEFERRED_AUTHORIZATION => [
            'TERMINAL',
            'TRTYPE',
            'AMOUNT',
            'ORDER',
            'TIMESTAMP'
        ],
        TransactionType::REVERSAL => [
            'TERMINAL',
            'TRTYPE',
            'AMOUNT',
            'ORDER',
            'TIMESTAMP'
        ],
        TransactionType::STATUS_CHECK => [
            'TERMINAL',
            'TRTYPE',
            'AMOUNT',
            'TIMESTAMP'
        ]
    ];

    /**
     * Fields used for generating extended message authentication code (MAC)
     */
    const MAC_EXTENDED_FIELDS = [
        TransactionType::SALE => [
            'ACTION',
            'RC',
            'APPROVAL',
            'TERMINAL',
            'TRTYPE',
            'AMOUNT',
            'CURRENCY',
            'ORDER',
            'RRN',
            'INT_REF',
            'PARES_STATUS',
            'ECI',
            'TIMESTAMP',
            'NONCE'
        ],
        TransactionType::DEFERRED_AUTHORIZATION => [
            'ACTION',
            'RC',
            'APPROVAL',
            'TERMINAL',
            'TRTYPE',
            'AMOUNT',
            'CURRENCY',
            'ORDER',
            'RRN',
            'INT_REF',
            'PARES_STATUS',
            'ECI',
            'TIMESTAMP',
            'NONCE'
        ],
        TransactionType::COMPLETE_DEFERRED_AUTHORIZATION => [
            'ACTION',
            'RC',
            'APPROVAL',
            'TERMINAL',
            'TRTYPE',
            'AMOUNT',
            'CURRENCY',
            'ORDER',
            'RRN',
            'INT_REF',
            'PARES_STATUS',
            'ECI',
            'TIMESTAMP',
            'NONCE'
        ],
        TransactionType::REVERSE_DEFERRED_AUTHORIZATION => [
            'ACTION',
            'RC',
            'APPROVAL',
            'TERMINAL',
            'TRTYPE',
            'AMOUNT',
            'CURRENCY',
            'ORDER',
            'RRN',
            'INT_REF',
            'PARES_STATUS',
            'ECI',
            'TIMESTAMP',
            'NONCE'
        ],
        TransactionType::REVERSAL => [
            'ACTION',
            'RC',
            'APPROVAL',
            'TERMINAL',
            'TRTYPE',
            'AMOUNT',
            'CURRENCY',
            'ORDER',
            'RRN',
            'INT_REF',
            'PARES_STATUS',
            'ECI',
            'TIMESTAMP',
            'NONCE'
        ],
        TransactionType::STATUS_CHECK => [
            'ACTION',
            'RC',
            'APPROVAL',
            'TERMINAL',
            'TRTYPE',
            'AMOUNT',
            'CURRENCY',
            'ORDER',
            'RRN',
            'INT_REF',
            'PARES_STATUS',
            'ECI',
            'TIMESTAMP',
            'NONCE'
        ]
    ];

    /**
     * Response codes
     */
    const RESPONSE_CODES = [
        'bg' => [
            '-1' => 'В заявката не е попълнено задължително поле',
            '-2' => 'Заявката съдържа поле с некоректно име',
            '-3' => 'Aвторизационният хост не отговаря или форматът на отговора е неправилен',
            '-4' => 'Няма връзка с авторизационния хост',
            '-5' => 'Грешка във връзката с авторизационния хост',
            '-6' => 'Грешка в конфигурацията на APGW',
            '-7' => 'Форматът на отговора от авторизационният хост е неправилен',
            '-10' => 'Грешка в поле "Сума" в заявката',
            '-11' => 'Грешка в поле "Валута" в заявката',
            '-12' => 'Грешка в поле "Идентификатор на търговеца" в заявката',
            '-13' => 'Неправилен IP адрес на търговеца',
            '-15' => 'Грешка в поле "RRN" в заявката',
            '-16' => 'В момента се изпълнява друга транзакция на терминала',
            '-17' => 'Отказан достъп до платежния сървър (напр. грешка при проверка на P_SIGN)',
            '-19' => 'Грешка в искането за аутентикация или неуспешна аутентикация',
            '-20' => 'Разрешената разлика между времето на сървъра на търговеца и e-Gateway сървъра е надвишена',
            '-21' => 'Транзакцията вече е била изпълнена',
            '-22' => 'Транзакцията съдържа невалидни данни за аутентикация',
            '-23' => 'Невалиден контекст на транзацията',
            '-24' => 'Заявката съдържа стойности за полета, които не могат да бъдат обработени. Например валутата е различна от тази на терминала или транзакцията е по-стара от 24 часа.',
            '-25' => 'Допълнителното потвърждение на транзакцията е отказано от картодържателя',
            '-26' => 'Невалиден BIN на картата',
            '-27' => 'Невалидно име на търговеца',
            '-28' => 'Невалидно допълнително поле (например AD.CUST_BOR_ORDER_ID)',
            '-29' => 'Невалиден отговор от ACS на издателя на картата',
            '-30' => 'Транзакцията е отказана',
            '-31' => 'Транзакцията е в процес на обработка',
            '-32' => 'Дублирана отказана транзакция',
            '-33' => 'Транзакцията е в процес на аутентикация на картодържателя',
            '-40' => 'Транзакцията е в процес на обработка',
            '00' => 'Транзакцията е завършена успешно',
            // TODO: Translate string below
            '01' => 'Refer to card issuer',
            '04' => 'Pick Up',
            '05' => 'Do not Honour',
            '06' => 'Error',
            '12' => 'Invalid transaction',
            '13' => 'Invalid amount',
            '14' => 'No such card',
            '15' => 'No such issuer',
            '17' => 'Customer cancellation',
            '30' => 'Format error',
            '35' => 'Pick-up, card acceptor contact acquirer',
            '36' => 'Pick up, card restricted',
            '37' => 'Pick up, call acquirer security',
            '38' => 'Pick up, Allowable PIN tries exceeded',
            '39' => 'No credit account',
            '40' => 'Requested function not supported',
            '41' => 'Pick up, lost card',
            '42' => 'No universal account',
            '43' => 'Pick up, stolen card',
            '54' => 'Expired card / target',
            '55' => 'Incorrect PIN',
            '56' => 'No card record',
            '57' => 'Transaction not permitted to cardholder',
            '58' => 'Transaction not permitted to terminal',
            '59' => 'Suspected fraud',
            '82' => 'Timeout',
            '85' => 'No reason to decline',
            '88' => 'Cryptographic failure',
            '89' => 'Authentication failure',
            '91' => 'Issuer or switch is inoperative',
            '95' => 'Reconcile error / Auth Not found',
            '96' => 'System Malfunction'
        ],
        'en' => [
            '-1' => 'A mandatory request field is not filled in',
            '-2' => 'CGI request validation failed',
            '-3' => 'Acquirer host (TS) does not respond or wrong format of e-gateway response template file',
            '-4' => 'No connection to the acquirer host (TS)',
            '-5' => 'The acquirer host (TS) connection failed during transaction processing',
            '-6' => 'e-Gateway configuration error',
            '-7' => 'The acquirer host (TS) response is invalid, e.g. mandatory fields missing',
            '-10' => 'Error in the "Amount" request field',
            '-11' => 'Error in the "Currency" request field',
            '-12' => 'Error in the "Merchant ID" request field',
            '-13' => 'The referrer IP address (usually the merchant\'s IP) is not the one expected',
            '-15' => 'Error in the "RRN" request field',
            '-16' => 'Another transaction is being performed on the terminal',
            '-17' => 'The terminal is denied access to e-Gateway',
            '-19' => 'Error in the authentication information request or authentication failed.',
            '-20' => 'The permitted time interval (1 hour by default) between the transaction timestamp request field and the e-Gateway time was exceeded',
            '-21' => 'The transaction has already been executed',
            '-22' => 'Transaction contains invalid authentication information',
            '-23' => 'Invalid transaction context',
            '-24' => 'Transaction context data mismatch',
            '-25' => 'Transaction confirmation state was canceled by user',
            '-26' => 'Invalid action BIN',
            '-27' => 'Invalid merchant name',
            '-28' => 'Invalid incoming addendum(s)',
            '-29' => 'Invalid/duplicate authentication reference',
            '-30' => 'Transaction was declined as fraud',
            '-31' => 'Transaction already in progress',
            '-32' => 'Duplicate declined transaction',
            '-33' => 'Customer authentication by random amount or verify one-time code in progress',
            '-40' => 'Client sidetransaction form in progress',
            '00' => 'Successfully completed',
            '01' => 'Refer to card issuer',
            '04' => 'Pick Up',
            '05' => 'Do not Honour',
            '06' => 'Error',
            '12' => 'Invalid transaction',
            '13' => 'Invalid amount',
            '14' => 'No such card',
            '15' => 'No such issuer',
            '17' => 'Customer cancellation',
            '30' => 'Format error',
            '35' => 'Pick-up, card acceptor contact acquirer',
            '36' => 'Pick up, card restricted',
            '37' => 'Pick up, call acquirer security',
            '38' => 'Pick up, Allowable PIN tries exceeded',
            '39' => 'No credit account',
            '40' => 'Requested function not supported',
            '41' => 'Pick up, lost card',
            '42' => 'No universal account',
            '43' => 'Pick up, stolen card',
            '54' => 'Expired card / target',
            '55' => 'Incorrect PIN',
            '56' => 'No card record',
            '57' => 'Transaction not permitted to cardholder',
            '58' => 'Transaction not permitted to terminal',
            '59' => 'Suspected fraud',
            '82' => 'Timeout',
            '85' => 'No reason to decline',
            '88' => 'Cryptographic failure',
            '89' => 'Authentication failure',
            '91' => 'Issuer or switch is inoperative',
            '95' => 'Reconcile error / Auth Not found',
            '96' => 'System Malfunction'
        ]
    ];

    /**
     * Описание: Терминал
     * Размер: 8
     * Съдържание: Ехо от заявката
     *
     * @var string
     */
    public $terminal;

    /**
     * Описание: Тип на трансакция
     * Размер: 1-2
     * Съдържание: Ехо от заявката
     *
     * @var integer
     */
    public $transactionType;

    /**
     * Описание: Поръчка
     * Размер: 6
     * Съдържание: Ехо от заявката
     *
     * @var string
     */
    public $order;

    /**
     * Описание: Сума
     * Размер: 12
     * Съдържание: Сума на поръчката
     *
     * @var float
     */
    public $amount;

    /**
     * Описание: Валута
     * Размер: 3
     * Съдържание: Ехо от заявката
     *
     * @var string
     */
    public $currency;

    /**
     * Описание: Действие
     * Размер: 1
     * Съдържание: E-Gateway код на действие: 0 – успешно приключена трансакция; 1 – дублирана трансакция; 2 – отказана трансакция; 3 – грешка при обработка на трансакцията
     *
     * @var integer
     */
    public $action;

    /**
     * Описание: Код на завършване
     * Размер: 2
     * Съдържание: Отговор при обработка на трансакция (ISO-8583, поле 39)
     *
     * @var string
     */
    public $responseCode;

    /**
     * Описание: Одобрение
     * Размер: 6
     * Съдържание: Код за одобрение (ISO- 8583, поле 38). Може да бъде празно, ако не е подадено от издателя на картата.
     *
     * @var string
     */
    public $approval;

    /**
     * Описание: Референция на трансакцията
     * Размер: 12
     * Съдържание: Референция на трансакцията (ISO-8583 - 1987, поле 37).
     *
     * @var string
     */
    public $retrievalReferenceNumber;

    /**
     * Описание: Вътрешна референция
     * Размер: 16
     * Съдържание: Вътрешна референция за е-Commerce gateway
     *
     * @var string
     */
    public $internalReference;

    /**
     * Описание: Тип на оригинална трансакция
     * Размер: 1-2
     * Съдържание: Тип на оригинална трансакцияв отговор на „Проверка на статус“
     *
     * @var integer
     */
    public $originalTranscationType;

    /**
     * Описание: Текстово описание на код на завършване
     * Размер: 1-255
     * Съдържание: Текстово описание на код на завършване
     *
     * @var string
     */
    public $statusMessage;

    /**
     * Описание: Маскиран номер карта
     * Размер: 16-19
     * Съдържание: Маскиран номер карта в в отговор на „Проверка на статус“ (напр. „5100XXXXXXXX0022“)
     *
     * @var string
     */
    public $cardNumber;

    /**
     * Описание: Дата/час
     * Размер: 19
     * Съдържание: Дата/час на оригиналната трансакция: YYYYMMDDHHMMSS
     *
     * @var string
     */
    public $originalTransactionDate;

    /**
     * Описание: Дата/час
     * Размер: 14
     * Съдържание: Дата/час на трансакцията по GMT (UTC): YYYYMMDDHHMMSS
     *
     * @var string
     */
    public $timestamp;

    /**
     * Описание: Статус на автентикация
     * Размер: 1
     * Съдържание: Статус на автентикация, използван в схемата 3-D Secure
     *
     * @var string
     */
    public $paresStatus;

    /**
     * Размер: 2
     * Съдържание: E-commerce индикатор (ECI)
     *
     * @var string
     */
    public $electronicCommerceIndicator;

    /**
     * Размер: 32
     * Съдържание: Съдържа 16 непредсказуеми случайни байтове, представени в шестнадесетичен формат. Може да съдържа главни латински букви A..Z и цифри 0..9.
     *
     * @var string
     */
    public $nonce;

    /**
     * Описание:: Подпис
     * Размер: 512
     * Съдържание: Код за автентициране на съобщението от APGW. Съдържа 256 байтав шестнадесетичен формат. Може да съдържа главни латински букви A..Z и цифри 0..9.
     *
     * @var string
     */
    public $pSign;

    /**
     * @var array
     */
    public $postData = [];

    /**
     * @var boolean
     */
    public $signatureIsVerified = false;

    /**
     * @param array $postData
     * @return Response|null
     */
    public static function withPost(array $postData) : Response {
        $instance = new self();

        $instance->transactionType = intval($postData['TRTYPE']);
        $instance->postData = $postData;

        if ($instance->transactionType == TransactionType::SALE) {
            $instance->terminal = $postData['TERMINAL'];
            $instance->transactionType = $postData['TRTYPE'];
            $instance->order = $postData['ORDER'];
            $instance->amount = floatval($postData['AMOUNT']);
            $instance->currency = $postData['CURRENCY'];
            $instance->action = intval($postData['ACTION']);
            $instance->responseCode = $postData['RC'];
            $instance->approval = $postData['APPROVAL'];
            $instance->retrievalReferenceNumber = $postData['RRN'];
            $instance->internalReference = $postData['INT_REF'];
            $instance->statusMessage = $postData['STATUSMSG'];
            $instance->cardNumber = $postData['CARD'];
            $instance->originalTransactionDate = $postData['TRAN_DATE'];
            $instance->timestamp = $postData['TIMESTAMP'];
            $instance->paresStatus = $postData['PARES_STATUS'];
            $instance->electronicCommerceIndicator = $postData['ECI'];
            $instance->nonce = $postData['NONCE'];
            $instance->pSign = $postData['P_SIGN'];
            // TODO: Review `TRAN_TRTYPE` and `LANG` when new official documentation.
        } elseif ($instance->transactionType == TransactionType::DEFERRED_AUTHORIZATION) {

        } elseif ($instance->transactionType == TransactionType::COMPLETE_DEFERRED_AUTHORIZATION) {

        } elseif ($instance->transactionType == TransactionType::REVERSE_DEFERRED_AUTHORIZATION) {

        } elseif ($instance->transactionType == TransactionType::REVERSAL) {

        } elseif ($instance->transactionType == TransactionType::STATUS_CHECK) {

        } else {
            return null;
        }

        return $instance;
    }

    /**
     * Request was successful
     *
     * @return boolean
     */
    public function isSuccessful() : bool {
        return $this->responseCode == '00';
    }

    /**
     * @param Borica $borica
     * @return Response
     */
    public function verify(Borica $borica) : Response {
        $mac = Borica::generateMacExtended($this->postData, true);

        $this->signatureIsVerified = $borica->verifySignature($mac, $this->pSign);

        return $this;
    }

    /**
     * Response code in human-readable format
     *
     * @param string $lang Language ("bg" or "en")
     * @return string
     */
    public function responseCodeDescription($lang = 'bg') : string {
        if (isset($this->responseCode) && array_key_exists($this->responseCode, $this::RESPONSE_CODES[$lang])) {
            return $this::RESPONSE_CODES[$lang][$this->responseCode];
        }

        return '';
    }

}
