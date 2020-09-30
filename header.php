
    <main class="page landing-page">
        <section class="clean-block clean-hero" style="background-image:url(&quot;assets/img/tech/image4.jpg&quot;);color:rgba(10, 150, 192, 0.85);">
            <div class="container">         
                <div class="row">
                    <div class="col-md-6 arrgement">
                        <h1 class="mb-4">We love to 
                            <strong class="typewrite" id="changeText"></strong>
                            <script>
                                var text = ["Develop", "Explore", "Capture","flying"];
                                var counter = 0;
                                var elem = document.getElementById("changeText");
                                var inst = setInterval(change, 1000);

                                function change() {
                                elem.innerHTML = text[counter];
                                counter++;
                                if (counter >= text.length) {
                                    counter = 0;
                                    // clearInterval(inst); // uncomment this if you want to stop refreshing after one cycle
                                }
                                }
                            </script>

                        </h1>
                        <p>Hawai Adda was formed in to Research & develop, manufacture and market a flexible product line of highly cost effective systems.</p>
                        
                        <button class="btn btn-outline-light btn-lg" type="button">Learn More</button>
                    </div>
                    <div class="col-md-6 arrgement">
                        <img src="assets/img/d-1.png" class="dronemovement saturn" alt="hawaiadda">
                    </div>
                </div>
            </div>   
        </section>