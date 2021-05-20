<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Veterinaria</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

    <link rel="stylesheet"  href="style.css">
    
    <style>

        body{
            background-image: url(image/fondo.jpg);
        }
        
        .welcome{
            width: 100%;
            max-width: 1000px;
            margin: auto;
            margin-top: 50px;
            background: rgba(0,0,0,0.6);
            text-align: center;
            padding: 20px;
        }
        
        .welcome img{
            width: 170px;
            height: 170px;
            text-align: center;
        }

        .welcome h1{
            font-size: 50px;
            color: white;
            font-weight: 100;
            margin-top: 20px;
        }

        .welcome h2{
            font-size: 50px;
            color: white;
            font-weight: 100;
            margin-top: 20px;
        }
        
        .welcome a{
            display: 20px;
            margin-top: 40px;
            font-size: 20px;
            padding: 10px;
            border: 1px solid white;
        }
        
        .welcome a:hover{
            color: black;
            background: white;
        }

        .welcome p{
            color: white;
        }

        .menu{
            width: 100%;
            height: 30px;
            max-height: 30px;
            max-width: 2000px;
            margin: auto;
            
        }

        .social {
    position: fixed; /* Hacemos que la posición en pantalla sea fija para que siempre se muestre en pantalla*/
    left: 0; /* Establecemos la barra en la izquierda */
    top: 200px; /* Bajamos la barra 200px de arriba a abajo */
    z-index: 2000; /* Utilizamos la propiedad z-index para que no se superponga algún otro elemento como sliders, galerías, etc */
}

    .social ul {
        list-style: none;
    }

    .social ul li a {
        display: inline-block;
        color:#fff;
        background: #000;
        padding: 10px 15px;
        text-decoration: none;
        -webkit-transition:all 500ms ease;
        -o-transition:all 500ms ease;
        transition:all 500ms ease; /* Establecemos una transición a todas las propiedades */
    }

    .social ul li .icon-facebook {background:#3b5998;} /* Establecemos los colores de cada red social, aprovechando su class */
    .social ul li .icon-twitter {background: #00abf0;}
    .social ul li .icon-googleplus {background: #d95232;}
    .social ul li .icon-pinterest {background: #ae181f;}
    .social ul li .icon-mail {background: #666666;}

    .social ul li a:hover {
        background: #000; /* Cambiamos el fondo cuando el usuario pase el mouse */
        padding: 10px 30px; /* Hacemos mas grande el espacio cuando el usuario pase el mouse */
    }

    .menu ul li a:hover {
         
        padding: 15px 15px; /* Hacemos mas grande el espacio cuando el usuario pase el mouse */
    }

    .menu a  .icon-home {background: #F9405C;}
        

    </style>
    
</head>
<body>

    <div class="menu">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#40CFF9;">
          <a href=""> </a>
          <br> <br><a class="icon-home" href="#">  </a>
          <a href=""> </a>
          <br> <br><a class="navbar-brand" href="#">Pet Shop - Clientes</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="indexc.php">Cliente</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="indexv.php">Veterinario</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="indexd.php">Mascota</a>
            </li>
        </ul>
    </div>
</nav>
</div>

<div class="welcome">
 <img src="image/icon.png" >
 <h1>Bienvenido a nuestra veterinaria</h1>
 <h2>¿Quienes Somos?</h2>
 <p>En Clínica Veterinaria Pet Shop contamos con un equipo de trabajo con trayectoria en el cuidando de tu mascota, es muy importante para nosotros hacer un servicio integral a nuestros pacientes, velando por su salud enfocándonos en el bienestar y prevención de enfermedades de las mascotas esta es la mejor forma de brindar tranquilidad a sus familias.

 Es por esto que en nuestras instalaciones podrás encontrar personal profesional y altamente calificado.</p>
 <p>  </p><br>

 <a href="cerrar.php">Cerrar sesion</a>
</div>

<div class="social">
        <ul>
            <li><a href="#" target="_blank" class="icon-facebook"></a></li>
            <li><a href="#" target="_blank" class="icon-twitter"></a></li>
            <li><a href="#" target="_blank" class="icon-instagram"></a></li>
            <li><a href="#" target="_blank" class="icon-pinterest"></a></li>
            <li><a href="#" class="icon-mail"></a></li>
        </ul>
    </div>

</body>
</html>