<?php
    $page_template_slug = get_page_template_slug();
    
    if ($page_template_slug == 'template-parts/home.php') { ?>
        <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "C60 Purple Power",
        "url": "https://c60purplepower.com/",
        "logo": "https://c60purplepower.com/wp-content/uploads/2017/12/11p-scaled-120x141.png",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "1-800-367-9364",
            "contactType": "customer service",
            "contactOption": "TollFree",
            "areaServed": ["US","GB","CA"],
            "availableLanguage": "en"
        },
        "sameAs": [
            "https://www.facebook.com/c60purplepower/",
            "https://twitter.com/c60purplepower/",
            "https://www.instagram.com/c60purplepower/",
            "https://www.youtube.com/c/C60PurplePower/",
            "https://www.pinterest.com/c60purplepower/"
        ]
        }
        </script>
    <?php
    } else if ($page_template_slug == 'template-parts/shop.php') { ?>
        <script type="application/ld+json">
        {
        "@context": "https://schema.org/", 
        "@type": "BreadcrumbList", 
        "itemListElement": [{
            "@type": "ListItem", 
            "position": 1, 
            "name": "C60 Purple Power",
            "item": "https://c60purplepower.com/"  
        },{
            "@type": "ListItem", 
            "position": 2, 
            "name": "Shop C60 Products",
            "item": "https://c60purplepower.com/shop/"  
        }]
        }
        </script>

    <?php
    } else if (is_product_category()) { ?>
        <script type="application/ld+json">
        {
        "@context": "https://schema.org/", 
        "@type": "BreadcrumbList", 
        "itemListElement": [{
            "@type": "ListItem", 
            "position": 1, 
            "name": "C60 Purple Power",
            "item": "https://c60purplepower.com/"  
        },{
            "@type": "ListItem", 
            "position": 2, 
            "name": "C60 Oil",
            "item": "https://c60purplepower.com/c60-oil/"  
        }]
        }
        </script>

    <?php
    } else if (is_product()) { ?>
        <script type="application/ld+json">
        {
        "@context": "https://schema.org/", 
        "@type": "BreadcrumbList", 
        "itemListElement": [{
            "@type": "ListItem", 
            "position": 1, 
            "name": "C60 Purple Power",
            "item": "https://c60purplepower.com/"  
        },{
            "@type": "ListItem", 
            "position": 2, 
            "name": "C60 Oil",
            "item": "https://c60purplepower.com/c60-oil/"  
        },{
            "@type": "ListItem", 
            "position": 3, 
            "name": "C60 in Organic Avocado Oil",
            "item": "https://c60purplepower.com/c60-oil/c60-avocado-oil/"  
        }]
        }
        </script>

    <?php    
    } else if ($page_template_slug == 'template-parts/faq.php') { ?>
        <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [{
            "@type": "Question",
            "name": "What is in C60 Purple Power?",
            "acceptedAnswer": {
            "@type": "Answer",
            "text": "Our products are made with 99.99% pure C60 (made in the USA) and Non-GMO, Certified Organic, cold-pressed oils. We offer C60 in Organic Avocado oil, Organic Extra Virgin Olive oil, and Organic MCT Coconut oil."
            }
        },{
            "@type": "Question",
            "name": "How many servings are there in an 8 oz bottle of C60 Purple Power?",
            "acceptedAnswer": {
            "@type": "Answer",
            "text": "An 8 oz bottle of c60 contains approximately 46 teaspoons; using the daily maintenance amount of 1 teaspoon, it should last approximately 45 days."
            }
        },{
            "@type": "Question",
            "name": "What is the daily recommended dose of C60 Purple Power?",
            "acceptedAnswer": {
            "@type": "Answer",
            "text": "We suggest you begin with ¼ to ½ teaspoon per day and build up to 1 teaspoon per day to maintain your health. Users facing significant health challenges or those who participate in high intensity athletic endeavors may consider up to 1 Tablespoon per day. Also, It's best to take your C60 Purple Power WITH FOOD in the morning. If you begin by chugging it you might find any potential detox happens too quickly and you may feel poorly as a result. Some users find taking their C60 Purple Power with an apple supports increased active hydrogen production."
            }
        },{
            "@type": "Question",
            "name": "Is C60 Purple Power Safe to Give My Pet?",
            "acceptedAnswer": {
            "@type": "Answer",
            "text": "Many users have reported a positive pet response. Please start with a very low dose, mixed in with your pet's food, e.g. 1/8 teaspoon or less, and observe your pet's response. We recommend coconut oil for dogs and avocado oil for cats. Olive oil can be used for any kind of pet. Avocado oil should not be used for birds."
            }
        },{
            "@type": "Question",
            "name": "Which carrier oil is right for me?",
            "acceptedAnswer": {
            "@type": "Answer",
            "text": "Our products are made with 99.99% pure C60 (made in the USA) and Non-GMO, Certified Organic, cold-pressed oils. We offer C60 in Organic Avocado oil, Organic Extra Virgin Olive oil, and Organic MCT Coconut oil. Organic Avocado oil is preferred by those with more sensitive digestive systems or who prefer a somewhat more easily digested fat. Organic Extra Virgin Olive oil is preferred by those who want to reduce their cholesterol levels. Organic MCT Coconut oil is preferred by those with glucose imbalance issues and athletes for extra energy."
            }
        },{
            "@type": "Question",
            "name": "How is C60 made?",
            "acceptedAnswer": {
            "@type": "Answer",
            "text": "There are two main ways to create raw C60. One method uses rods of elemental carbon vaporized by electricity in a Helium atmosphere. This method imitates the way C60 is made in the atmospheres of giant red stars, as their atmospheres are being blown out into space. The other method uses a hydrocarbon wax and heat source, in a combustion based method. This method imitates the process by which the blacked wick at the end of a candle ends up containing around 0.25% C60."
            }
        },{
            "@type": "Question",
            "name": "How much C60 is contained in a bottle?",
            "acceptedAnswer": {
            "@type": "Answer",
            "text": "A 16 oz bottle of C60 in Avocado or Olive Oil has around 409 mg of C60 in it. 8oz bottle of C60 in Avocado or Olive Oil contains 204.6 mg of C60 4 oz bottle of C60 in Avocado or Olive Oil contains 102 mg of C60. MCT Coconut Oil has much shorter triglycerides, so it holds about half the C60 that the other carrier oils hold."
            }
        },{
            "@type": "Question",
            "name": "What type of bottle do you use to package your product?",
            "acceptedAnswer": {
            "@type": "Answer",
            "text": "We use glass bottles for all of our products."
            }
        }]
        }
        </script>

    <?php
    } else if ($page_template_slug == 'template-parts/blog.php') { ?>
        <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "https://c60purplepower.com/how-to-increase-stamina-endurance/"
        },
        "headline": "How to Increase Stamina and Endurance Naturally",
        "description": "It’s common knowledge that regular exercise is good for the body, improving muscle tone, digestion, cardiovascular strength, and a multitude of other systems. However, it may be hard to get off the couch for a few reasons. Age or lack of activity can make a new exercise routine seem impossible, knowing there will be discomfort and fatigue on the horizon. Even people who exercise regularly may dread the soreness in their limbs in the days after a hard workout.",
        "image": "https://c60purplepower.com/wp-content/uploads/2021/02/how-to-increase-stamina-and-endurance-naturally-scaled.jpeg",  
        "author": {
            "@type": "Person",
            "name": "Sierra Samuel"
        },  
        "publisher": {
            "@type": "Organization",
            "name": "C60 Purple Power",
            "logo": {
            "@type": "ImageObject",
            "url": "https://c60purplepower.com/wp-content/uploads/2017/12/11p-scaled-120x141.png"
            }
        },
        "datePublished": "2021-03-04"
        }
        </script>

    <?php
    }
?>