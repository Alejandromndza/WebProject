<section id="contact" class="container content-section text-center">

  <link rel="stylesheet" type="text/css" href="css/contacto.css">

  <div class="container-contact100">

    <div class="wrap-contact1002">

      <form class="contact100-form validate-form" method="post" action="/php/contact.php">
					<span class="contact100-form-title" id="contact1">

					</span>
					<span class="contact100-form-title" id="contact2">
						Contacto
					</span>

					<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="El nombre es requerido">
						<span class="label-input100"></span>
						<input class="input100" type="text" name="name" placeholder="Introduce tu nombre">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Introduce un email valido: ejemplo@hotmail.com">
						<span class="label-input100"></span>
						<input class="input100" type="text" name="email" placeholder="Introduce tu email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="El mensaje es requerido">
						<span class="label-input100"></span>
						<textarea class="input100" name="message" placeholder="Introduce tu mensaje..."></textarea>
						<span class="focus-input100"></span>
					</div>

					<div class="container-contact100-form-btn">
						<button class="contact100-form-btn" type="submit" value="Submit">
							<span>
								Enviar
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="false"></i>
							</span>
						</button>
					</div>
				</form>
    </div>
  </div>
</section>


<?php
if(isset($_POST['submit'])){
    $to = "alejme02@ucm.es"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $name = $_POST['name'];
    $msg = $_POST['message'];
    $message = $name. " mensaje:" . "\n\n" . $_POST['message'];
    $subject = "Form ROCAMORA";
    $headers = "De:" . $from;
    mail($to,$subject,$message,$headers);
    echo "Mensaje enviado. Gracias " . $name . ", contactaremos contigo lo más pronto posible.";

    }
?>
