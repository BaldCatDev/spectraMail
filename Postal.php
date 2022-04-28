<?php
/**
 * Postal прокладка для обработки тестовых писем
 * шаблоны:
 *      <method_name>__template.tpl ie: mail_auth__template.tpl - шаблон письма о подключении аутентификации по почте
 *
 */


class Postal
{
    /**
     * @var array|string[] Доступные темы сообщений
     *
     */
    public const TOPICS = [
//        'register' => 'Подтверждение регистрации',
//        'reg' => 'Добро пожаловать в Spectra Cash',
//        'referral_reg' => 'NEW_REG',
//        'mail_auth' => 'Подключение аутентификации по почте',
//        'g2fa' => 'Подключение Google Authenticator',
//        'referral_depo' => 'NEW_DEP_REG',
//        'i_depo' => 'Открытие депозита',
//        'add_balance' => 'NEW_PAY_BALANCE',
//        'i_pay' => 'NEW_PAYOUT',
//        'i_not_pay' => 'NEW_PAYOUT',
        'recovery' => 'Сброс пароля',
//        'close_depo' => 'Срок действия вашего депозита истек',
//        'open_depo' => 'Открытие депозита',
//        'transfer_money' => 'Перевод средств',
//        'send_contact_form' => 'WE_RECEIVED_YOUR_REQUEST',
//        'unsubscribe' => 'WE_RECEIVED_YOUR_REQUEST',
//        'new_ticket' => 'new_ticket',
//        'new_ticket_message' => 'new_ticket_message',
    ];

    /**
     * @var string HTML код шаблона сообщения в соотв. с его типом
     */
    private string $messageTemplate;
    /**
     * @var string HTML код готового сообщения
     */
    private string $message;

    /**
     * @var string email получателя
     */
    private string $recipient;

    /**
     * @param string $type   :  тип (один из TOPICS)
     */
    public function __construct( string $type, string $email )
    {
        $this -> recipient = $email;

        // общий шаблон:
        $htmlTemplate = file_get_contents('templates/html.tpl');

        // шаблон типа сообщения:
        $messageTemplate = file_get_contents('templates/' . $type . '__template.tpl');

        // склеим:
        $this -> messageTemplate = preg_replace('/%CONTENT%/', $messageTemplate, $htmlTemplate);
    }

    /**
     * Заполняем шаблон данными.
     * @return void
     */
    private function prepare_message( ){
        $replaces = [
            '/%TITLE%/' => 'Сброс пароля',
            '/%URL%/' => 'https://google.com'
        ];
        $this -> message = preg_replace(array_keys( $replaces ), array_values($replaces), $this -> messageTemplate);
    }

    function send()
    {
        self::prepare_message();
        echo 'email получателя: ' . $this -> recipient;
        echo $this -> message;
//        include 'function.php';
//        send_message(
//            $this -> recipient,
//            $this -> type,
//        );
    }
}