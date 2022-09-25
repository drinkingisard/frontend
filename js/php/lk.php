<?php session_start(); ?>
<!doctype html>
<html lang="ru">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Playfair+Display:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">

    <title>Personal account</title>
    <style>
        body {
          margin: 0;
          padding: 0;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
          font-family: 'Montserrat', sans-serif;
          font-family: 'Playfair Display', serif;
          background: url(bc2.jpg);
        }
        p {
            font-size: 1.5rem;
            color: white;
        }
        h1 {
          color: white;
        }
        .bi {
          color: white;
          font-weight: 700;
        }
        .edit-btn {
          color: #007bff;
          cursor: pointer;
        }
        .save-btn {
          color: #6f42c1;
          cursor: pointer;
        }
        .cancel-btn {
          color: #dc3545;;
          cursor: pointer;
        }
    </style>
  </head>
  <body>

    <div class="container mt-5">
        <h1 class="text-center">PERSONAL ACCOUNT <i class="bi bi-person-workspace"></i></h1>
        <div class="row mt-3">
            <div class="col-6 mt-3">
                <p>Name: <span id="result"><?php echo $_SESSION["name"]?></span>
                <span class="edit-btn">[edit]</span>
                <span class="save-btn" hidden data-item="name">[save]</span>
                <span class="cancel-btn" hidden>[cancel]</span>
              </p>
                
                <p>Surname:  <span id="result"><?php echo $_SESSION["surname"]?></span>
                <span class="edit-btn">[edit]</span>
                <span class="save-btn" hidden data-item="surname">[save]</span>
                <span class="cancel-btn" hidden>[cancel]</span>
              </p>
                <p>E-mail:  <?php echo $_SESSION["email"]?></p>
                <p>Id:  <?php echo $_SESSION["id"]?></p>
            </div>
        </div>
    </div>

    <script>
      let edit_buttons = document.querySelectorAll(".edit-btn");
      let save_buttons = document.querySelectorAll(".save-btn");
      let cancel_buttons = document.querySelectorAll(".cancel-btn");

      for (let i = 0; i < edit_buttons.length; i++) {
          let inputValue = edit_buttons[i].previousElementSibling.innerText;

          edit_buttons[i].addEventListener("click", ()=>{
            edit_buttons[i].previousElementSibling.innerHTML = `<input type="text" value="${inputValue}">`;
            save_buttons[i].hidden = false;
            cancel_buttons[i].hidden = false;
            edit_buttons[i].hidden = true;
          });

          save_buttons[i].addEventListener("click", async () =>{          
            let newInputValue = document.querySelectorAll('input')[0].value;
            edit_buttons[i].previousElementSibling.innerHTML = newInputValue;
            // let a = document.getElementsByTagName('input')[i].value;
            // console.log(a);
            // document.getElementById('result').innerHTML = a;
            save_buttons[i].hidden = true;
            cancel_buttons[i].hidden = true;
            edit_buttons[i].hidden = false;

            let formData = new FormData();
            formData.append("value", newInputValue);
            formData.append("item", save_buttons[i].dataset.item);
            console.log(formData);
            let response = await fetch("lk.obr.php", {
            method: "POST",
            body: formData,
            })
          })

          cancel_buttons[i].addEventListener("click", ()=>{
            edit_buttons[i].previousElementSibling.innerHTML = inputValue;
            // edit_buttons[i].previousElementSibling.innerHTML = `<span> ${inputValue} </span>`;
            save_buttons[i].hidden = true;
            cancel_buttons[i].hidden = true;
            edit_buttons[i].hidden = false;
          })

      }


    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

  </body>
</html>