<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Biblioweb: Detalle Libro</title>
    <link rel="stylesheet" href="/biblioweb/public/css/detalle-libro.css" />
  </head>
  <body>
    <header class="container">
      <div class="header-top">
        <a href="/biblioweb/">
          <img
            src="/biblioweb/public/assets/img/logo-desktop.png"
            alt="Logo de Biblioweb: Libro abierto por la mitad con partículas desvaneciéndose del lado derecho"
          />
        </a>
        <div class="header-searchbar-wrapper">
          <form action="/biblioweb" method="post">
            <input
              class="header-searchbar"
              type="search"
              name="search"
              placeholder="Libro o autor"
              aria-placeholder="Buscar por libro o autor"
            />
            <input type="submit" style="display: none" />
          </form>
        </div>
        <button id="open-login-dialog" class="header-session-btn">Log in</button
        ><span class="header-session-btn--deco"> // </span
        ><button id="open-register-dialog" class="header-session-btn">
          Sign up
        </button>
        <?php if ($_SESSION['username']): ?>
        <span class="header-session-btn--deco"> // </span
        ><form action="/biblioweb/user/logout/" method="post">
            <button id="close-session" class="header-session-btn">
              Salir
            </button>
        </form>
        <?php endif; ?>
      </div>
      <nav class="page-nav">
        <ul class="page-nav-links" role="list">
          <li class="page-nav-item">
            <a class="page-nav-link" href="/biblioweb/libros/">Libros</a>
          </li>
          <li class="page-nav-item">
            <a class="page-nav-link" href="/biblioweb/autores/">Autores</a>
          </li>
          <li class="page-nav-item">
            <a class="page-nav-link" href="/biblioweb/rating/">Rating</a>
          </li>
          <?php if ($_SESSION['role'] === 'admin'): ?>
          <li class="page-nav-item">
            <a class="page-nav-link" href="/biblioweb/dashboard/">Dashboard</a>
          </li>
          <?php endif; ?>
        </ul>
      </nav>
    </header>
    <main>
      <nav aria-label="breadcrumbs" class="container nav-breadcrumbs">
        <ol
          class="breadcrumb-list"
          role="list"
          class="container section breadcrumbs"
        >
          <li class="breadcrumb-item">
            <a
              class="breadcrumb-link"
              href="/biblioweb/libros/"
              aria-current="location"
              >Libros</a
            >
          </li>
          <li class="breadcrumb-item">
            <a class="breadcrumb-link" href="#" aria-current="location"
              ><?= $book->get_genre()->get_name() ?></a
            >
          </li>
          <li class="breadcrumb-item">
            <a class="breadcrumb-link" href="#" aria-current="location"
              ><?= $book->get_title() ?></a
            >
          </li>
        </ol>
      </nav>
      <section class="container section-detalle">
        <div class="general-info-section">
          <div class="book-info-wrapper">
            <img
              class="book-info-cover"
              src="<?= $book->get_cover() ?>"
              alt="Portada del libro"
            />
            <div class="book-info">
              <h1 id="book-title" class="book-title"><?= $book->get_title() ?></h1>
              <h2 id="book-author" class="book-author"><?= $book->get_author()->get_full_name() ?></h2>
              <div class="book-info-item">
                <span>Año de publicación: </span>
                <span id="published-date" class="book-property"><?= $book->get_pub_year() ?></span>
              </div>
              <div class="book-info-item">
                <span>Género: </span>
                <span id="gender" class="book-property"><?= $book->get_genre()->get_name() ?></span>
              </div>
              <div class="book-info-item">
                <span>Número de páginas: </span>
                <span id="number-of-pages" class="book-property"><?= $book->get_no_pages() ?></span>
              </div>
              <div class="book-info-item">
                <span>Idioma: </span>
                <span id="language" class="book-property"><?= $book->get_language() ?></span>
              </div>
              <div class="book-info-item">
                <span>Idioma original: </span>
                <span id="original-language" class="book-property"
                  ><?= $book->get_org_language() ?></span
                >
              </div>
              <button class="btn btn-primary">Lee el libro</button>
            </div>
          </div>
          <div class="rating-stars">
          <?php for ($i = 1; $i <= (int) $book->get_rating(); $i++) { ?>
          <img
            src="/biblioweb/public/assets/img/icons/rating-star.svg"
            alt="Estrella de rating"
          />
          <?php } ?>
          </div>
        </div>
        <h3>Descipción</h3>
        <p><?= $book->get_description() ?></p>
      </section>
      <section class="container section-info">
        <div class="info-header">
          <h2 class="section-title">Lee cómodamente donde quieras</h2>
          <img
            src="/biblioweb/public/assets/img/logo-info-section.jpg"
            alt="Logo de Biblioweb: Libro abierto por la mitad con partículas desvaneciéndose del lado derecho"
          />
        </div>
        <div class="info-blocks">
          <div class="info-block">
            <h3>Novelas, clásicos y best-sellers</h3>
            <p>
              Biblioweb es la mayor biblioteca de libros electrónicos de Perú
              por suscripción. Más de 10000 obras en la web: novela policíaca,
              ciencia ficción, fantasía, novela romántica, libros de psicología
              empresarial, para niños, literatura moderna y clásica.
            </p>
          </div>
          <div class="info-block">
            <h3>Cualquier libro por una suscripción</h3>
            <p>
              Todas las obras están incluidas en las suscripciones: estándar o
              premium. Suscríbase a la suscripción Premium para tener acceso
              completo a la biblioteca en línea, o a la suscripción Estándar
              para leer sólo los best-sellers y los clásicos. Puede elegir el
              periodo de suscripción que más le convenga: un mes, tres meses o
              un año. Se acabó comprar de uno en uno.
            </p>
          </div>
          <div class="info-block">
            <h3>Recomendamos los mejores libros</h3>
            <p>
              Nuestras colecciones son una ayuda para elegir las obras adecuadas
              según el estado de ánimo, el tema, la estación del año, la
              popularidad o el criterio de los expertos. Seleccionamos los
              mejores libros y audiolibros en nuestra biblioteca digital para
              que no tenga que perder tiempo buscando. También le informamos
              sobre los ganadores de premios y concursos de libros.
            </p>
          </div>
          <div class="info-block">
            <h3>Estadísticas personales</h3>
            <p>
              Las estadísticas de lectura te motivan a leer más a lo largo de la
              semana, el mes y el año. Cada día registramos el número de páginas
              leídas, dibujamos gráficos en el perfil de la aplicación y
              enviamos estadísticas mensuales a tu correo electrónico. ¿Hace
              tiempo que no retomas el libro? ¡No es el momento de ponerse al
              día!
            </p>
          </div>
        </div>
      </section>
    </main>
    <footer>
      <div class="container">
        <div class="footer-link">
          <h4 class="footer-link__title">Acerca de Biblioweb</h4>
          <ul class="footer-link__link-list" role="list">
            <li>
              <a href="#">Acerca del proyecto</a>
            </li>
            <li>
              <a href="#">Información legal</a>
            </li>
            <li>
              <a href="#">Nosotros</a>
            </li>
            <li>
              <a href="#">Coopera con Biblioweb</a>
            </li>
          </ul>
        </div>
        <div class="footer-link">
          <h4 class="footer-link__title">Acerca del registro</h4>
          <ul class="footer-link__link-list" role="list">
            <li>
              <a href="register.html">Regístrate</a>
            </li>
            <li>
              <a href="#">Cómo registrarse</a>
            </li>
            <li>
              <a href="#">Ayuda</a>
            </li>
          </ul>
        </div>
        <div class="footer-link">
          <h4 class="footer-link__title">Acerca del registro</h4>
          <a class="btn btn-primary" href="#">8 (025) 752-33-03</a>
        </div>
        <div class="footer-link">
          <h4 class="footer-link__title">Síguenos</h4>
          <ul class="footer-link__link-list iconos">
            <li class="footer-social-icon-wrapper">
              <a href="#">
                <img
                  src="/biblioweb/public/assets/img/icons/instagram-icon.svg"
                  alt="Ícono de Instagram"
                />
              </a>
            </li>
            <li class="footer-social-icon-wrapper">
              <a href="#">
                <img
                  src="/biblioweb/public/assets/img/icons/facebook-icon.svg"
                  alt="Ícono de Facebook"
                />
              </a>
            </li>
            <li class="footer-social-icon-wrapper">
              <a href="#">
                <img
                  src="/biblioweb/public/assets/img/icons/youtube-icon.svg"
                  alt="Ícono de YouTube"
                />
              </a>
            </li>
            <li class="footer-social-icon-wrapper">
              <a href="#">
                <img
                  src="/biblioweb/public/assets/img/icons/twitter-icon.svg"
                  alt="Ícono de Twitter"
                />
              </a>
            </li>
          </ul>
        </div>
      </div>
    </footer>
    <dialog id="login-dialog" class="registration">
      <form action="/biblioweb/user/login/" method="post">
        <button
          type="button"
          class="registration__close-btn"
          id="close-login-dialog"
        >
          X
        </button>
        <h3>Inicia sesión</h3>
        <p>
          Llena tus credenciales y adéntrate al maravilloso mundo de la lectura.
        </p>
        <div class="input-box">
          <label for="log-username">Usuario</label>
          <input
            type="text"
            id="log-username"
            name="username"
            placeholder="Ej. robcmartin"
          />
        </div>
        <div class="input-box">
          <label for="log-pass">Contraseña</label>
          <input
            type="password"
            id="log-pass"
            name="user-passwd"
            placeholder="*************"
          />
        </div>
        <button type="submit" class="btn btn-primary registration__btn">
          Inicia sesión
        </button>
        <div class="registration-info-text">
          <span>¿Aún no tienes una cuenta? </span
          ><button
            type="button"
            class="registration__cta-btn"
            id="close-and-open-register"
          >
            Regístrate
          </button>
        </div>
      </form>
    </dialog>
    <dialog id="register-dialog" class="registration">
      <form action="/biblioweb/user/register/" method="post">
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="user-role" value="usuario">
        <button
          type="button"
          class="registration__close-btn"
          id="close-register-dialog"
        >
          X
        </button>
        <h3>Regístrate</h3>
        <p>
          Llena tus credenciales y adéntrate al maravilloso mundo de la lectura.
        </p>
        <div class="input-box">
          <label for="reg-username">Usuario</label>
          <input
            type="text"
            id="reg-username"
            name="username"
            placeholder="Ej. robcmartin"
          />
        </div>
        <div class="input-box">
          <label for="reg-email">Correo</label>
          <input
            type="email"
            id="reg-email"
            name="user-email"
            placeholder="Ej. rob@cmartin.com"
          />
        </div>
        <div class="input-box">
          <label for="reg-pass">Contraseña</label>
          <input
            type="password"
            id="reg-pass"
            name="user-passwd"
            placeholder="*************"
          />
        </div>
        <button type="submit" class="btn btn-primary registration__btn">
          Regístrate
        </button>
        <div class="registration-info-text">
          <span>¿Ya tienes una cuenta? </span
          ><button
            type="button"
            class="registration__cta-btn"
            id="close-and-open-login"
          >
            Inicia sesión
          </button>
        </div>
      </form>
    </dialog>
    <script src="/biblioweb/public/js/modals.js"></script>
  </body>
</html>
