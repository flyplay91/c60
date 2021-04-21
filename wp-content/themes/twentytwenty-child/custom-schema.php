<?php
    $page_template_slug = get_page_template_slug();
    echo $page_template_slug;
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
    }
?>