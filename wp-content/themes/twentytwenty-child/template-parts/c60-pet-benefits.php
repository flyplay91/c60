<?php
/**
 * Template Name: What C60 Pets Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main class="healthy-page c60-pet-benefits">
    <?php if( have_rows('breadcrumb_group')) : 
        $breadcrumb_group = get_field('breadcrumb_group');
        $breadcrumb_text = $breadcrumb_group['breadcrumb_text'];
        
        while ( have_rows('breadcrumb_group')): the_row(); ?>
            <div class="page-breadcrumb inner-section-1220">
                <?php echo $breadcrumb_text ?>
            </div>
        <?php endwhile;
    endif; ?>
    <section class="healthy-hero">
        <div class="healthy-hero__inner inner-section-1220">
            <h1>Why should you choose C60 Purple Power<br />for Pets? That’s an easy one…</h1>

            <div class="healthy-hero__img-text">
                <div class="healthy-hero__text">
                    <p>Our pets mean the world to us. And, well beyond companionship, research shows that having a pet as part of your family can boost your immune system, lessen anxiety, and lower your risk of cardiovascular disease</p>
                    <p>They can even help relieve pain. In a study of people who had undergone total joint replacement surgery, the ones who spent time with therapy dogs needed 28 percent less pain medication. </p>
                    <p>For everything our pets do for us, physically and emotionally, we now offer C60 Purple Power for Pets as a way to return the favor 10-fold!</p>
                    <p>Because, just like humans, as our pets get older, they are more easily tired, they can develop heart problems, and live with stiff achy joints. </p>
                    <p>And just like it does for humans, C60 can offer a world of benefits to our favorite furry companions by lifting the oxidative burden at the cellular level.</p>
                </div>
                    
                <div class="healthy-hero__img">
                    <div class="test_1">
                        <h4>My 12-year-old dog acts<br />like a young pup!</h4>
                        <p>“My 12-year-old chihuahua had trouble walking and could no longer jump up on my bed.</p>
                        <p> After giving her a daily dose of C60, she began to act more like a puppy—running around and easily jumping up on my bed. </p>
                        <p>When I took her to the vet, months later, he said her heart is strong, her mobility issues were gone, and her coat looked very healthy.”</p>
                    </div>
                    <div class="test_name">Gina W.</div>
                </div>
            </div>  
        </div>
    </section>

    <section class="c60-pets2">
        <div class="healthy-hero__inner inner-section-1220">
            <h2>Benefits of C60 for Pets</h2>
            <div class="healthy-way__text">
                <p>C60 is perhaps the most powerful antioxidant ever discovered. And our C60 Purple Power for Pets offers a wide range of benefits that help support your pet with healthy aging naturally. C60 works at the cellular level to neutralize free radicals, optimizing energy production, and preventing free radical damage before it can even begin. </p>
                <p>The result is a marked decrease in inflammation throughout the body. Inflammation is now widely regarded as the underlying cause of many of today’s biggest health challenges. Including cardiovascular and metabolic health, brain and memory health, and joint health and muscle recovery, to name a few. Most users of C60 Purple Power for Pets share with us that their pet’s energy level, mood, and in many cases, mobility improves with daily use of C60.</p>
                <p>As one of the most powerful antioxidants, C60 can perform the antioxidant functions of COQ10, glutathione, catalase, and superoxide dismutase. Not only do these antioxidants play an important role in energy production, they may also provide cellular protection against toxic environmental factors. </p>
            </div>
                
            <div class="healthy-hero__img-text">
                <div class="healthy-hero__text">
                    <p>In 2012, scientists found that C60 nearly doubled the lifespan of test animals and prevented cognitive decline and other diseases associated with aging. <span class="text-indent">1</span></p>
                    <p>And, in another study, test animals were given C60 for two weeks before being exposed to what should have been a lethal dose of radiation.</p>
                    <p>The animals were observed for another 30-days and, not only was C60 shown to protect against radiation-induced mortality, but the test subjects also showed enhanced immune function and improving mitochondrial function (the primary source of cellular energy). <span class="text-indent">2</span></p>
                    <p>Some of the most common reasons pet owners are turning to C60 Purple Power for Pets include: </p>
                    <p>
                        <ul>
                            <li>Promotes an increase in mental & physical energy </li>
                            <li>Supports joint & bone health & mobility </li>
                            <li>Promotes longevity and healthy aging </li>
                            <li>Promotes a healthy inflammatory response</li>
                            <li>Supports eye health & vision</li>
                            <li>Promotes brain health, memory, cognitive function & nerve health</li>
                            <li>Supports healthy immune function</li>
                            <li>Supports healthy allergy response</li>
                        </ul>
                    </p>
                </div>
                        
                <div class="healthy-hero__img">
                    <div class="test_1">
                        <h4>All I can say is WOW!</h4>
                        <p>“My dog suffered from a severe skin condition for years, and after thousands of dollars of veterinary bills, I finally started my 10 lb. dog on C60 Purple Power (1/4 tsp daily) nearly 3 months ago. </p>
                        <p> Now, for the first time in YEARS, he has hair (he had alopecia and bloody sores before the C60), his skin appears fully healed, and he never scratches anymore, which is something he did constantly before the C60. </p>
                        <p> All I can say is WOW! I am so grateful for his restored health!” </p>
                    </div>
                    <div class="test_name">Laurie S.</div>
                </div>
            </div>  

            <p>In addition to the power benefits of C60, the 100% certified organic, healthy, farm-direct oils we use in our pet products offer additional benefits which may support other aspects of your pet’s health.</p>
        </div>
    </section>


    <section class="c60-pets3">
        <div class="healthy-hero__inner inner-section-1220">
            <h2>Why Choose Our C60 Oils for Your Furry Friend?</h2>
            <div class="healthy-hero__img-text">
                <div class="healthy-way__text">
                    <p>By choosing C60 Purple Power, you are choosing the highest quality, 99.99% pure sublimated C60 (never exposed to chemical solvents), in certified organic oils, available today.</p>
                    <p>Not only was our company founded by a biogeochemist, but every product we offer has been formulated with research and science behind it. We are pioneers in the industry and have gained a reputation for being the leading choice for all C60 products. We encourage you to explore our site to learn more about the unique benefits of C60 for pets and why thousands are making the switch to C60 Purple Power every day.</p>
                </div>
                <div class="healthy-hero__img">
                    <img src="/wp-content/uploads/2021/03/c60-for-horses-1.jpeg" alt="Why Choose Our C60 Oils for Your Furry Friend?">
                </div>
            </div>
        </div>
    </section>
    

    <section class="c60-pets4">
        <div class="healthy-hero__inner inner-section-1220">
            <h2>What Is the Right C60 Dosage for Pets?*</h2>
            <div class="healthy-way__text">
                <p>We suggest using C60 for pets once a day. C60 dosage for dogs, cats, and other pets should be based on their weight and age. As a general rule of thumb, you can use the following measurements:</p>
                <p>
                    <ul>
                        <li>0-25 lbs: ¼ tsp</li>
                        <li>26-50 lbs: ½ tsp</li>
                        <li>50-100 lbs: 1 tsp</li>
                        <li>100+ lbs: 1 tsp per 100 lbs</li>
                    </ul>
                </p>
                <p>*Please consult your veterinarian or medical professional. These statements and products have not been evaluated by the Food & Drug Administration. This product is not intended to diagnose, treat, cure, or prevent any disease.</p>
            </div>
        </div>
    </section>

    <section class="c60-pets5">
        <div class="healthy-hero__inner inner-section-1220">
            <h2>C60 Oil for Pets: FAQs</h2>
            <div class="healthy-hero__img-text">
                <div class="healthy-hero__img">
                    <div class="test_1">
                        <h4>This is AMAZING!</h4>
                        <p>“My dog is 17 and very lethargic. She lays around without moving much. She doesn't see well or hear well. We started giving her C60 Purple Power by putting a few drops on a small piece of bread with a little peanut butter on top (she loves peanut butter). </P>
                        <p>It's now 2 weeks later, and I am having a hard time believing it, but she walks around now, hears us when we call her, and she can smell her food now. She has resumed barking at the doorbell and today, she began playing with a doggy play rope we have for my other dog. This is amazing.” </p>
                    </div>
                    <div class="test_name">Joe M.</div>
                </div>
                <div class="healthy-hero__text">
                    <h5><strong>What is C60 for pets?</strong></h5>
                    <p> Short for Carbon 60, C60 is a naturally occurring molecule made up of 60 carbon atoms forming a shape that resembles a hollow soccer ball. C60 is relatively new discovery, but it is believed to be one of the most powerful antioxidants ever discovered. The scientists who discovered C60 won a Nobel prize for their work in 1996. It is characterized as a “free radical sponge” with antioxidant effects several hundred-fold higher than conventional antioxidants.</p>
                    <h5><strong>What are the benefits of C60 for pets?</strong></h5>
                    <p>Thanks to its potent antioxidant properties, the primary benefits of C60 are its unique ability to fight inflammation and enhance energy production at the cellular level. C60 has also been shown to increase energy, support immune function, support brain, joint and eye health, promote a healthy allergy response, and increase energy among other benefits that can help improve different aspects of your pet’s well-being.</p>
                </div>
            </div>  

            <div class="healthy-hero__img2">
                <img src="/wp-content/uploads/2021/03/dog-eating-c60.jpeg" alt="What are the benefits of C60 for pets?">
            </div>

            <h5><strong>What is the best way to give C60 to my pets?</strong></h5>
            <p>C60 Purple Power is intended to be administered orally. You can easily add it to their food. We recommend avocado, extra virgin olive oil, or MCT coconut for cats, and extra virgin olive or avocado for dogs. Like humans, pets may have a preferred flavor. Do not give avocado oil to birds. Do not give to your pet if your pet is on blood thinners.</p><br />

            <h5><strong>How fresh is your C60 pet oil?</strong></h5>
            <p>C60 Purple Power is made with two ingredients, 99.99% pure, sublimated Carbon 60 (never exposed to solvents), and 100% certified, organic, farm-direct, healthy oils. By choosing C60 Purple Power, you can rest assured you are getting the highest-quality C60 oil in the industry. Our products are 3rd party tested for quality, purity, consistency, and bioavailability. All bottles include a manufactured date and best-by date. </p><br />

            <h5><strong>How should I store C60 oil for pets? Should I keep it in the refrigerator?</strong></h5>
            <p>Our C60 for pets should be stored in a dark, dry place away from both heat and light. Do not refrigerate C60. </p><br />

            <h5><strong>How long does it take for C60 to work on pets?</strong></h5>
            <p> Some users notice a difference in their pet’s energy levels within in the first few days. Most users report positive additional benefits for their pets within 30 days of daily use. </p>
            <p>The benefits of C60 Purple Power for pets may provide both short-term and long-term benefits. Please consult a veterinarian or your pet’s healthcare, or medical provider for questions related to your pet’s health.</p>
            <p>Individual results may vary depending on your type of pet, their size, individual wellness needs, and daily intake, and existing health conditions. </p>
            <p>If you have additional questions regarding C60 Purple Power and your pet, please contact us at <a href="mailto:support@c60purplepower.com">support@c60purplepower.com</a>.
            <p>
                <span style="font-size:12px;">
                    *Please consult your veterinarian or medical professional. These statements and products have not been evaluated by the Food & Drug Administration. This product is not intended to diagnose, treat, cure, or prevent any disease.
                </span>
            </p>

            <div class="healthy-video__source">
                <label>Sources</label>
                <div class="healthy-video__source-links">
                    <a href="https://pubmed.ncbi.nlm.nih.gov/22498298/">
                        <span>1</span>
                        https://pubmed.ncbi.nlm.nih.gov/22498298/ 
                    </a>

                    <a href="https://pubmed.ncbi.nlm.nih.gov/19914272/">
                        <span>2</span>
                        https://pubmed.ncbi.nlm.nih.gov/19914272/                                
                    </a>                                                        
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer();