<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "portfolio"; 

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menjalankan query untuk mengambil data kontak
$sql = "SELECT * FROM mycontacts";
$result = $conn->query($sql);

// Membuat array untuk menyimpan semua baris hasil
$contacts = array();

// Memeriksa apakah hasil query mengandung baris data
if ($result->num_rows > 0) {
    // Memasukkan semua baris hasil ke dalam array $contacts
    while ($row = $result->fetch_assoc()) {
        $contacts[] = $row;
    }
}

// Menutup koneksi database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Mahathir</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- Sisipkan Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>
    <main>
        <!-- Sidebar -->
        <aside class="sidebar" data-sidebar>
            <div class="sidebar-info">
                <?php foreach ($contacts as $contact): ?>
                    <figure class="avatar-box">
                        <img src="<?php echo $contact['avatar']; ?>" alt="<?php echo $contact['name']; ?>" width="80">
                    </figure>
                    <div class="info-content">
                        <h1 class="name" title="<?php echo $contact['name']; ?>"><?php echo $contact['name']; ?></h1>
                        <p class="title"><?php echo $contact['title']; ?></p>
                    </div>
                <?php endforeach; ?>
                <button class="info_more-btn" data-sidebar-btn>
                    <span>Show Contacts</span>
                    <ion-icon name="chevron-down"></ion-icon>
                </button>
            </div>

            <div class="sidebar-info_more">
                <!-- Looping untuk menampilkan kontak -->
                <?php foreach ($contacts as $contact): ?>
                    <div class="separator"></div>
                    <ul class="contacts-list">
                        <li class="contact-item">
                            <div class="icon-box">
                                <ion-icon name="mail-outline"></ion-icon>
                            </div>
                            <div class="contact-info">
                                <p class="contact-title">Email</p>
                                <a href="mailto:<?php echo $contact['email']; ?>" class="contact-link"><?php echo $contact['email']; ?></a>
                            </div>
                        </li>
                        <li class="contact-item">
                            <div class="icon-box">
                                <ion-icon name="phone-portrait-outline"></ion-icon>
                            </div>
                            <div class="contact-info">
                                <p class="contact-title">Phone</p>
                                <a href="tel:<?php echo $contact['phone']; ?>" class="contact-link"><?php echo formatPhoneNumber($contact['phone']); ?></a>
                            </div>
                        </li>
                        <li class="contact-item">
                            <div class="icon-box">
                                <ion-icon name="calendar-outline"></ion-icon>
                            </div>
                            <div class="contact-info">
                                <p class="contact-title">Birthday</p>
                                <time datetime="<?php echo $contact['birthday']; ?>"><?php echo formatDate($contact['birthday']); ?></time>
                            </div>
                        </li>
                        <li class="contact-item">
                            <div class="icon-box">
                                <ion-icon name="location-outline"></ion-icon>
                            </div>
                            <div class="contact-info">
                                <p class="contact-title">Location</p>
                                <address><?php echo $contact['province'] . ', ' . $contact['country']; ?></address>
                            </div>
                        </li>
                    </ul>
                <?php endforeach; ?>
                <div class="separator"></div>
                  <ul class="social-list">
                    <li class="social-item">
                    <a href="https://github.com/Mahathirrr" class="social-link" target="_blank">
                      <ion-icon name="logo-github"></ion-icon>
                    </a>
                  </li>

                  <li class="social-item">
                    <a href="https://www.instagram.com/emhaa._/" class="social-link" target="_blank">
                      <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                  </li>
              </ul>   
            </div>
        </aside>

    <!--
      - #main-content
    -->
    <div class="main-content">
      <!--
        - #NAVBAR
      -->
      <nav class="navbar">
        <ul class="navbar-list">
          <li class="navbar-item">
            <button class="navbar-link  active" data-nav-link>About</button>
          </li>

          <li class="navbar-item">
            <button class="navbar-link" data-nav-link>Resume</button>
          </li>

          <li class="navbar-item">
            <button class="navbar-link" data-nav-link>Blog</button>
          </li>

          <li class="navbar-item">
            <button class="navbar-link" data-nav-link>Contact</button>
          </li>
        </ul>
      </nav>

      <!--
        - #ABOUT
      -->
      <article class="about  active" data-page="about">
        <header>
          <h2 class="h2 article-title">About me</h2>
        </header>
        <section class="about-text">
          <p>
            I am currently a student pursuing a degree in Informatics at Syiah Kuala University. With a strong passion for technology and problem-solving, I have developed a keen interest in backend development. In my journey as a student, I have been actively engaged in learning about server-side programming languages, database management, and building APIs. I find joy in the intricacies of backend development, where I get to create robust and efficient solutions that power the functionality of web applications.
          </p>
          <p>
            Beyond my academic pursuits, I am also involved in various extracurricular activities and projects that allow me to apply my skills and broaden my understanding of software development. My goal is to continue honing my skills in backend development and eventually contribute to innovative projects that make a positive impact on people's lives. I am driven by a curiosity to explore new technologies and a commitment to continuous learning in the ever-evolving field of computer science.
          </p>
        </section>

        <!--
          - service
        -->
        <section class="service">
          <h3 class="h3 service-title">What i'm doing</h3>
          <ul class="service-list">
            <li class="service-item">
              <div class="service-icon-box">
                <img src="./assets/images/icon-design.svg
                " alt="design icon" width="40">
              </div>
              <div class="service-content-box">
                <h4 class="h4 service-item-title">Web design</h4>
                <p class="service-item-text">
                  Crafting modern and high-quality website designs prioritizing simplicity, aesthetics, and intuitive user experience.
                </p>
              </div>
            </li>

            <li class="service-item">
              <div class="service-icon-box">
                <img src="./assets/images/icon-dev.svg" alt="Web development icon" width="40">
              </div>
              <div class="service-content-box">
                <h4 class="h4 service-item-title">Web development</h4>
                <p class="service-item-text">
                  High-quality code and performance, focusing on creating efficient, scalable, and maintainable web applications.
                </p>
              </div>
            </li>
          </ul>
        </section>
      </article>

      <!--
        - #RESUME
      -->

      <article class="resume" data-page="resume">
        <header>
          <h2 class="h2 article-title">Resume</h2>
        </header>
        <section class="timeline">
          <div class="title-wrapper">
            <div class="icon-box">
              <ion-icon name="book-outline"></ion-icon>
            </div>
            <h3 class="h3">Education</h3>
          </div>

          <ol class="timeline-list">
            <li class="timeline-item">
              <h4 class="h4 timeline-item-title">Syiah Kuala University</h4>
              <span>2022 - Present</span>
              <p class="timeline-text">
                I am currently a fourth-semester student majoring in Informatics at the Faculty of Mathematics and Natural Sciences, Syiah Kuala University.
              </p>
            </li>

            <li class="timeline-item">
              <h4 class="h4 timeline-item-title">SMAN Modal Bangsa Aceh</h4>
              <span>2020 — 2022</span>
              <p class="timeline-text">
                SMAN Modal Bangsa Aceh marked the beginning of my boarding school experience. Renowned as the top high school in Aceh, it provided an excellent educational foundation.
              </p>
            </li>

            <li class="timeline-item">
              <h4 class="h4 timeline-item-title">MTsN Model Banda Aceh</h4>
              <span>2017 — 2020</span>
              <p class="timeline-text">
                MTsN Model Banda Aceh, acclaimed as the premier junior high school in Banda Aceh, has garnered numerous awards and distinctions, offering me a rich and rewarding academic experience.
              </p>
            </li>
          </ol>
        </section>

        <section class="timeline">
          <div class="title-wrapper">
            <div class="icon-box">
              <ion-icon name="book-outline"></ion-icon>
            </div>
            <h3 class="h3">Experience</h3>
          </div>

          <ol class="timeline-list">
            <li class="timeline-item">
              <h4 class="h4 timeline-item-title">Golang Developer</h4>
              <span>2023 — Present</span>
              <p class="timeline-text">
                Proficient in Go programming language, specializing in developing efficient and scalable software solutions.
              </p>
            </li>

            <li class="timeline-item">
              <h4 class="h4 timeline-item-title">Java Developer</h4>
              <span>2023 — Present</span>
              <p class="timeline-text">
                Experienced in Java programming language and associated technologies, adept at crafting versatile and high-performance software solutions.
              </p>
            </li>
          </ol>
        </section>

        <section class="skill">
          <h3 class="h3 skills-title">My skills</h3>
          <ul class="skills-list content-card">
            <li class="skills-item">
              <div class="title-wrapper">
                <h5 class="h5">Golang</h5>
                <data value="80">80%</data>
              </div>
              <div class="skill-progress-bg">
                <div class="skill-progress-fill" style="width: 80%;"></div>
              </div>
            </li>

            <li class="skills-item">
              <div class="title-wrapper">
                <h5 class="h5">Lua</h5>
                <data value="60">50%</data>
              </div>
              <div class="skill-progress-bg">
                <div class="skill-progress-fill" style="width: 60%;"></div>
              </div>
            </li>

            <li class="skills-item">
              <div class="title-wrapper">
                <h5 class="h5">Java</h5>
                <data value="70">70%</data>
              </div>
              <div class="skill-progress-bg">
                <div class="skill-progress-fill" style="width: 70%;"></div>
              </div>
            </li>
          </ul>
        </section>
      </article>

      <!--
        - #BLOG
      -->

      <article class="blog" data-page="blog">
        <header>
          <h2 class="h2 article-title">Blog</h2>
        </header>
        <section class="blog-posts">
          <ul class="blog-posts-list">
            <li class="blog-post-item">
              <a href="#">
                <figure class="blog-banner-box">
                  <img src="./assets/images/blog-1.png" alt="neovim" loading="lazy">
                </figure>
                <div class="blog-content">
                  <div class="blog-meta">
                    <p class="blog-category">Technology</p>
                    <span class="dot"></span>
                    <time datetime="2022-02-23">October 23, 2023</time>
                  </div>
                  <h3 class="h3 blog-item-title">My Neovim Setup Guide</h3>
                  <p class="blog-text">
                    Streamlining My Development Process: A Deep Dive into Neovim Configuration
                  </p>
                </div>
              </a>
            </li>

            <li class="blog-post-item">
              <a href="#">
                <figure class="blog-banner-box">
                  <img src="./assets/images/blog-2.webp" alt="tmux" loading="lazy">
                </figure>
                <div class="blog-content">
                  <div class="blog-meta">
                    <p class="blog-category">Technology</p>
                    <span class="dot"></span>
                    <time datetime="2022-02-23">December 20, 2023</time>
                  </div>
                  <h3 class="h3 blog-item-title">Mastering Tmux: Setup Guide, Custom Keymaps, and Enhanced Aesthetics</h3>
                  <p class="blog-text">
                    Unleashing Terminal Power: A Comprehensive Guide to Tmux Configuration
                  </p>
                </div>
              </a>
            </li>
          </ul>
        </section>
      </article>

      <!--
        - #CONTACT
      -->
      <article class="contact" data-page="contact">
        <header>
          <h2 class="h2 article-title">Contact</h2>
        </header>
        <section class="mapbox" data-mapbox>
          <figure>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d625.4040626030469!2d95.32917663351802!3d5.556867083595702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1710844678913!5m2!1sid!2sid" 
              width="400" height="300" loading="lazy"></iframe>
          </figure>
        </section>
        <section class="contact-form">
          <h3 class="h3 form-title">Contact Form</h3>
          <form action="#" class="form" data-form>
            <div class="input-wrapper">
              <input type="text" name="fullname" class="form-input" placeholder="Full name" required data-form-input>
              <input type="email" name="email" class="form-input" placeholder="Email address" required data-form-input>
            </div>
            <textarea name="message" class="form-input" placeholder="Your Message" required data-form-input></textarea>
            <button class="form-btn" type="submit" disabled data-form-btn>
              <ion-icon name="paper-plane"></ion-icon>
              <span>Send Message</span>
            </button>
          </form>
        </section>
      </article>
    </div>
  </main>

  <!--
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>

<?php

// Fungsi untuk memformat nomor telepon
function formatPhoneNumber($number)
{
    // Menghilangkan karakter non-digit dari nomor telepon
    $cleanedNumber = preg_replace('/\D/', '', $number);

    // Memeriksa apakah nomor telepon memiliki kode negara Indonesia (+62)
    if (substr($cleanedNumber, 0, 2) == '62') {
        // Memformat nomor telepon dengan kode negara Indonesia (+62)
        $formattedNumber = '+(' . substr($cleanedNumber, 0, 2) . ') ' . substr($cleanedNumber, 2, 3) . ' ' . substr($cleanedNumber, 5, 4) . ' ' . substr($cleanedNumber, 9);
    } else {
        // Jika tidak memiliki kode negara Indonesia, tambahkan kode negara secara manual
        $formattedNumber = '+(' . substr($cleanedNumber, 0, 2) . ') ' . substr($cleanedNumber, 2, 3) . ' ' . substr($cleanedNumber, 5, 4) . ' ' . substr($cleanedNumber, 9);
    }

    return $formattedNumber;
}


// Fungsi untuk memformat tanggal
function formatDate($date)
{
    $formattedDate = date('F j, Y', strtotime($date));
    return $formattedDate;
}
?>
