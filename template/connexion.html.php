<div>
<div class="container">
      <div class="img_conect">
        <img id="logo1" src="../public/image/sonatel_logo.jpeg" alt="">
      </div>
      <form action="index.php?page=home&m=1" method="POST">
        <div class="login">
            <div class="red">Email et Mot de Passe Requis </div>
          <div class="eml">
            <label class="email" for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Enter email address*"required>
          </div>
          <div class="mdp">
            <label class="paswd" for="password">password</label>
            <div>
                <input type="password" id="password" name="password" placeholder="Enter your password*" required>
                <i id="yeux" class="fa-solid fa-eye-slash"> </i>
            </div>
          </div>
        </div>
        <div class="forgot">
            <label><span><input type="checkbox"></span><span class="rmb">Remember me</span></label>
          <a href="#">Mot de passe oublié ?</a>
        </div>
          <button class="button-connect" type="submit">Log in</button>
      </form>
    </div>
</div>
   
 