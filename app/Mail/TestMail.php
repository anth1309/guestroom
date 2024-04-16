<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class TestMail extends Mailable
{
   public function build()
   {
      return $this->view('mails.test'); // Assurez-vous que le fichier test.blade.php existe dans le dossier "resources/views/emails"
   }
}
