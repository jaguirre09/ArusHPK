<?php
require_once "PHPMailer/Exception.php";
require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "constants.php";

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class SendEmail
{
    private string $name;
    private int $phone;
    private string $location;
    private string $message;
    private string $printer;

    /**
     * SendEmail constructor.
     * init SendEmail class but is required call {@link SendEmail::sendMail()} function
     * @param string $name Username
     * @param int $phone User phone
     * @param string $location Printer location
     * @param string $message User message
     * @param string $printer Printer device
     */
    public function __construct(string $name, int $phone, string $location, string $message, string $printer)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->location = $location;
        $this->message = $message;
        $this->printer = $printer;
    }

    /**
     * Execute {@link PHPMailer} and send email
     * @return bool|string return true if sent correctly else return a string with error details
     */
    public function sendMail()
    {
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->CharSet = 'UTF-8';                                   // charset
            $mail->Host = SMTP_HOST;                                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                     // Enable SMTP authentication
            $mail->Username = SMTP_USERNAME;                            // SMTP username
            $mail->Password = SMTP_PASSWORD;                            // SMTP password
            if (SMTP_SECURE != null) {
                $mail->SMTPSecure = SMTP_SECURE;                        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            }
            $mail->Port = SMTP_PORT;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom(SMTP_USERNAME, SMTP_NAME);
            $mail->addAddress(EMAIL_RECIPIENT);

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = "$this->name reportó desde $this->printer";
            $msg = "<b>Nombre:</b> $this->name<br>";
            $msg .= "<b>Teléfono:</b> $this->phone<br>";
            $msg .= "<b>Ubicación:</b> $this->location<br>";
            $msg .= "<b>Impresora:</b> $this->printer<br><br>";
            $msg .= "<b>Mensaje:</b><br>$this->message<br>";
            $mail->Body = $msg;

            $mail->send();
            return true;
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
