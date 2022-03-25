
<main class="main">
<section class="home" id="home" data-spy>
        <div class="header-content"><!---->
            <div class="header-shape shape-one layer" data-depth="-5">
                <img src="../public/images/shape/shape-1.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-two layer" data-depth="5">
                <img src="../public/images/shape/shape-2.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-three layer" data-depth="-2">
                <img src="../public/images/shape/shape-3.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-four layer" data-depth="3">
                <img src="../public/images/shape/shape-4.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-five layer" data-depth="4">
                <img src="../public/images/shape/shape-5.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-six layer" data-depth="-3">
                <img src="../public/images/shape/shape-6.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-seven layer" data-depth="7">
                <img src="../public/images/shape/shape-1.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-eight layer" data-depth="6">
                <img src="../public/images/shape/shape-2.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-nine layer" data-depth="-4">
                <img src="../public/images/shape/shape-3.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-ten layer" data-depth="-5">
                <img src="../public/images/shape/shape-4.png" alt="Shape">
            </div> <!-- header shape -->
        </div>
        <div class="home-content container">
            <h1 class="titles">Busness is now digital</h1>
            <p class="text">We blend insights and strategy to create digital products for forward-thinking organisations.</p>
            <br><br>
            <a class='button' href="#about">Get started</a>

            <div class="social-link">
                <a href="#" class="link"><i class="lni-facebook-original"></i></a>
                <a href="#" class="link"><i class="lni-twitter-original"></i></a>
                <a href="#" class="link"><i class="lni-linkedin-original"></i></a>
                <a href="#" class="link"><i class="lni-instagram-original"></i></a>
            </div>

        </div>
        <div class="img">
            <img src="../public/images/jamie-street-VP4WmibxvcY-unsplash.jpg" alt="">
        </div>
    </section>

        <section class="about container" id="about" data-spy>
            <div class="section-title text-center">
                <h1 class="title">About Us</h1>
                <p>Trincot is a company that operates in the digital branch, making use of new technology, thus ensuring the optimization of the tasks carried out</p>
            </div>
            <div class="section-body">
                <div class="text">
                    <h2>You frequently ask yourself these questions about us</h2>
                    <ul>
                        <li class="list"><a href="#content0"><p>The ones who are trincot ?</p> <span><i class="lni-chevron-right"></i></span></a></li>
                        <ul>
                            <ol id="content0" data-target="0">
                                <p>
                                    Trincot is a private startup created on July 02, 2021 by Mr. KAMGAING TETEU Kevin Marius Computer engineer.
                                </p>
                            </ol>
                        </ul>
                        <li class="list"><a href="#content1"><p>In which field of activity does he work ?</p> <span><i class="lni-chevron-right"></i></span></a></li>
                        <ul>
                            <ol id="content1" data-target="1">
                                <p>
                                    We operate in the field of innovation of new information and communication technologies.
                                </p>
                            </ol>
                        </ul>
                        <li class="list"><a href="#content2"><p>what are its main missions in their fields of practice ?</p> <span><i class="lni-chevron-right"></i></span></a></li>
                        <ul>
                            <ol id="content2" data-target="2">
                                <p>
                                    trincot has a few main missions namely:
                                    <li>become a leader in the field of ICT innovation.</li>
                                    <li>Participate in the massive digitization of the various sectors of activity in the world.</li>
                                    <li>Contribute to the emergence of our country Cameroon.</li>
                                </p>
                            </ol>
                        </ul>
                        <li class="list"><a href="#content3"><p>where is the trincot office based?.</p> <span><i class="lni-chevron-right"></i></span></a></li>
                        <ul>
                            <ol id="content3" data-target="3">
                                <p>
                                    we are based in cameroon, in the city of yaounde not far from the nlongkak roundabout.
                                </p>
                            </ol>
                        </ul>
                    </ul>
                </div>
                <div class="img">
                <img src="../public/images/3.png" alt="about">
            </div>
            </div>
        </section>
        <section class="services container" id="services" data-spy>
            <div class="section-title text-center">
                <h1 class="title">Services</h1>
                <p>Will we be able to choose the elements of technology that improve the quality of life and avoid those that deteriorate it?</p>
            </div>
            <div class="items">
                <?php
                    foreach($services as $service) {
                ?>
                    <div class="item">
                        <i class="<?= $service->picture ?>"></i>
                        <h2><?= $service->name; ?></h2>
                        <span><?= $service->description; ?></span>
                    </div>
                <?php
                    }
                ?>
            </div>

        </section>
        <section class="blog container" id="blog" data-spy>
            <div class="section-title text-center">
                <h1 class="title">Last blog</h1>
                <p>The latest articles on our best blog!!!!</p>
            </div>
            <div class="section-body">
            <?php

                foreach($posts as $post) { 
            ?>
                    <div class="card">
                        <div class="card-image">
                            <img src="<?= "../public/admin/img/uploads/".$post->picture ?>" alt="">
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">
                                <a href="<?= $post->url; ?>"><?= $post->name; ?></a>
                                <br>
                                <span>7 days ago.</span>
                            </h4>
                        </div>
                    </div>
            <?php
                }

            ?>
            </div>
            <div class="card-footer">
                <a class='button' href="index.php?p=posts.index" class="btn">See more</a>
            </div>
        </section>
        <section class="contact container" id="contact" data-spy>
            <div class="section-title text-center">
                <h2 class="title">Contact Us</h2>
                <p>would you like to meet us for a possible service? contact us via your information below!</p>
            </div>
            <div class="section-contact">
                <div class="card-contact">
                    <span class="card-icon"><i class="lni-map-marker icon"></i></span>
                    <h3 class="card-title">Address</h3>
                    <p>Nlongkak Yaounde,<br> Republic of cameroon</p>
                </div>
                <div class="card-contact">
                    <span class="card-icon"><i class="lni-phone icon"></i></span>
                    <h3 class="card-title">Phone</h3>
                    <p>+237 694 70 32 80 <br> +237 672 45 12 19</p>
                </div>
                <div class="card-contact">
                    <span class="card-icon"><i class="lni-envelope icon"></i></span>
                    <h3 class="card-title">Email</h3>
                    <p>trincot@info.com</p>
                </div>
            </div>
            <div class="authers-section">
                <div class="form-section">
                    <form action="index.php#contact" method="post">
                        <input class="input input-text" type="text" name="name" id="name" placeholder="Name">
                        <input class="input input-text" type="email" name="email" id="email" placeholder="Email">
                        <input class="input input-text" type="text" name="subject" id="subject" placeholder="Subject">
                        <textarea class="input textarea" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>

                        <button type="submit">Send message</button>
                    </form>
                </div>
                <div class="maps-section">
                    <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=yaounde%20nlongkak&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
            </div>
        </section>
    </main>
    