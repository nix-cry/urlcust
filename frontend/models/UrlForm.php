<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class UrlForm extends Model
{
    public $nameurl;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;
    public $newurl;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['nameurl', 'email', 'subject', 'body','newurl'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
            'nameurl' => 'Ссылка',
            'newurl' => 'Новая ссылка'
        ];
    }


    
    // public function afterFind() 
    // {
    //     return $this->newurl =  ".jpg";
    // }

    // /**
    //  * Sends an email to the specified email address using the information collected by this model.
    //  *
    //  * @param string $email the target email address
    //  * @return bool whether the email was sent
    //  */
    // public function sendEmail($email)
    // {
    //     return Yii::$app->mailer->compose()
    //         ->setTo($email)
    //         ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
    //         ->setReplyTo([$this->email => $this->name])
    //         ->setSubject($this->subject)
    //         ->setTextBody($this->body)
    //         ->send();
    // }
}
