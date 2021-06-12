<section class="py-5">
    <div class="container">
        <div class="container text-center p-4">
            <h4>Main Thread</h4>
            <small class="form-text text-muted">Most Popular Section</small>
            <hr style="height: 3px; width:180px;">
        </div>
        <div class="row">
            <div class="row my-4">
                <!-- fetch all categories  -->
                <?php include "includes/_dbconnect.php"; ?>
                <?php 
                    $sql = "SELECT * FROM `categories`";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                    // echo $row['category_id'];
                    $id = $row['category_id'];
                    $cat = $row['category_name'];
                    $des = $row['category_description'];
                    echo '
                    <div class="col-md-4  my-3">
                        <div class="card">
                        <img src="https://source.unsplash.com/500x300/?'.$cat.',corona" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title"><a href="threadlist.php?catid='.$id.'">' . $cat . '</a></h5>
                            <p class="card-text">'.substr($des, 0 , 80).'...</p>
                            <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
                            </div>
                        </div>
                    </div>
                    ';
                    }    
                ?>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid pl-0 pr-0 bg-dark text-center p-5">
        <div class="text-center">
            <img src="/cowinbihar/images/logo.jpg" alt="" style="border-radius: 100px;">
            <p class="text-light pt-4">A Small Effort To Help You</p>
        </div>
    </div>
</section>
<section>
    <div class="container p-5">
        <div class="container text-center p-4">
            <h4>Information About Ambulance</h4>
            <small class="form-text text-muted">Find the nearest contact number for emergency assistance</small>
            <hr style="height: 3px; width:180px;">
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="text" class="form-control" aria-label="Text input with dropdown button">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">District</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div role="separator" class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="text" class="form-control" aria-label="Text input with dropdown button">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Police Station</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div role="separator" class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="text" class="form-control" aria-label="Text input with dropdown button">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Hospital</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div role="separator" class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary btn-block">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section style="background-color: #e3e3e3;" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 py-3">
                <h4 class="text-center">What is Coronavirus!!!</h4>
                <hr style="height: 3px; width:380px;">
                <p>
                Corona virus is a type of virus. There are many different types, and some cause disease. In 2019,
                The coronavirus, identified with SARS-CoV-2, caused a respiratory illness called COVID-19.
                <h5>How does coronovirus spread?</h5>
                So far, researchers know that the coronavirus spreads through droplets and virus particles in the air when a
                infected
                The person breathes, talks, laughs, sings, coughs or sneezes. big drops few
                in seconds
                can fall to the ground, But tiny infectious particles can circulate in the air and accumulate in indoor spaces,
                Especially
                Where many people gather and there is poor ventilation. This is why masks to prevent COVID-19
                wear, hand
                Cleanliness and physical distancing is essential. <br>
                <br>
                <h5>More on how does coronovirus spread?</h5>
                
Symptoms appear in people within two to 14 days of exposure to the virus. from coronavirus
                infected
                The person is contagious to others for up to two days before symptoms appear, and they develop their own immunity.
                system
                and remain contagious to others for 10 to 20 days, depending on the severity of their illness.
                </p>
                <br>
            </div>
        </div>
    </div>
</section>
<section class="py-3">
    <div class="container pb-5">
        <h4 class="text-center" style="margin-top: 40px;">KEEP IN TOUCH! </h4>
        <hr style="height: 3px; width:380px;">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">We Appriciate Your Effort</h4>
                        <hr>
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone
                                    else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Your Message</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Keep me upadte</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h5>HOW CAN WE HELP YOU!</h5>
                        <p class="form-text text-muted">
                        Please select any option below your entry. If you don't get what you need
                            So please fill out the form.
                        </p>
                        <h6>How to book an ambulance</h6>
                        <p>Call the number given in the service section, then you will get your vehicle!</p>
                        <h6>How to become a member</h6>
                        <p>Signup with your valid mobile and then Congratulations you are a Corona Warrior!</p>
                        <h6>Would you like to help us!</h6>
                        <p>Signup with your valid mobile and then Congratulations you are a Corona Warrior!</p>
                        <p>ईमेल: deepakkumarsah355@gmail.com</p>
                        <p>फ़ोन: 6200960560, 9939377229</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>