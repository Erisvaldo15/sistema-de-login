<div id="popup">
    <header id="header">
       <a class="close" onclick="popupToggle();"> <img src="assets/img/cancel.png" alt="Icone para Sair"> </a>
    </header>
    <div id="container"> <!--- Modal --->
      <img src="assets/img/email.png" alt="Icone de um Email">
         <div class="title">
             <h2> Resgate Sua senha </h2>
          </div>
          <div class="text">
             <p id="message"> Digite logo abaixo o seu e-mail e a nova senha que você deseja que faça parte de sua conta. </p>
         </div>
         <form action="" method="post">
            <div class="input-box">
               <input type="email" name="mail" id="email" placeholder="Enter email">
               <input type="password" name="password" id="password" placeholder="Enter New Password">
            </div>
             <div id="button">
                   <button type="submit" name="reset_password" class="reset"> CHANGE PASSWORD </button>
             </div>
        </form>
   </div>
</div>