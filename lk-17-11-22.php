<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
      integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
      crossorigin="anonymous"
    />
    <title>Личный кабинет</title>
    <style>
      p {
        font-size: 1.2rem;
        font-weight: 500;
      }
      input {
        font-size: 1.2rem;
        font-weight: 500;        
      }
    </style>
  </head>
  <body>
    <div class="container mt-5">
      <h1 class="text-center mb-3">Личный кабинет</h1>

      <p>Имя: &nbsp;<span><?= $_SESSION["name"];?></span>
      <span class="edit-buttons btn btn-danger ml-5">Изменить</span>
      <span class="save-buttons btn btn-success ml-5" hidden>Сохранить</span>
      <span class="cancel-buttons btn btn-info ml-2" hidden>Отменить</span>
      </p>

      <p>Фамилия: &nbsp;<span><?php echo $_SESSION["lastname"];?></span>
      <span class="edit-buttons btn btn-danger ml-5">Изменить</span>
      <span class="save-buttons btn btn-success ml-5" hidden>Сохранить</span>
      <span class="cancel-buttons btn btn-info ml-2" hidden>Отменить</span>
      </p>

      <!-- Можно записать двумя способами: ?php echo или ?= -->

      <p>E-mail: &nbsp;<?php echo $_SESSION["email"];?></p>

      <p>Id: &nbsp;<?php echo $_SESSION["id"];?></p>

    </div>
    <script>
      let edit_buttons = document.querySelectorAll(".edit-buttons");
      let save_buttons = document.querySelectorAll(".save-buttons");
      let cancel_buttons = document.querySelectorAll(".cancel-buttons");

      for(let i = 0; i < edit_buttons.length; i++) {
        let inputValue = edit_buttons[i].previousElementSibling.innerText;

        edit_buttons[i].addEventListener("click", ()=>{

          edit_buttons[i].previousElementSibling.innerHTML = `<input type="text" id="lala" value="${inputValue}">`;
          save_buttons[i].hidden = false;
          cancel_buttons[i].hidden = false;
          edit_buttons[i].hidden = true;
        });
        
        save_buttons[i].addEventListener("click", ()=>{

          let newInputValue = edit_buttons[i].previousElementSibling.firstElementChild.value;
          
          edit_buttons[i].previousElementSibling.innerText = newInputValue;
          save_buttons[i].hidden = true;
          cancel_buttons[i].hidden = true;
          edit_buttons[i].hidden = false;

      });

        cancel_buttons[i].addEventListener("click", ()=>{

          edit_buttons[i].previousElementSibling.innerText = inputValue;
          save_buttons[i].hidden = true;
          cancel_buttons[i].hidden = true;
          edit_buttons[i].hidden = false;

      });

    }
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
