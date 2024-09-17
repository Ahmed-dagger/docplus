<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('frontend')}}/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>doctoria-plus</title>
</head>

<body>
    <header class="Header">
        <div class="d-flex align-items-center container-fluid">
            <div class="container-fluid justify-content-between" id="Logo">
                <img src="{{asset('frontend')}}/img/Doctoria-Logo.png" class="Logo" alt="" />
            </div>

            <div class="justify-content-center align-items-center pcMenu">
                <ul class="d-flex menuListPC align-items-center justify-content-center">
                    <a href="{{route('home')}}" class="text-decoration-none">
                        <li class="d-flex text-light">Home Page</li>
                    </a>
                    <a href="" class="text-decoration-none">
                        <li class="d-flex text-light">Contact US</li>
                    </a>
                    <a href="{{route('privacy')}}" class="text-decoration-none">
                        <li class="d-flex text-light">Privacy Policy</li>
                    </a>
                    <a href="https://play.google.com/store/apps/details?id=com.tailors.doctoria&hl=en" class="text-decoration-none">
                        <li>
                            <button class="download">
                                <svg class="saveicon" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"
                                        stroke-linejoin="round" stroke-linecap="round"></path>
                                </svg>
                                Download
                            </button>
                        </li>
                    </a>
                </ul>
            </div>

            <div class="justify-content-between align-items-center moblieMenu">
                <div class="my-5">
                    <div class="">
                        <button class="Menubtn" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                            <img width="40" height="40" src="https://img.icons8.com/ios/ffffff/128/menu--v7.png"
                                alt="menu--v7" />
                        </button>
                    </div>

                    <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasRight"
                        aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <button type="button" class="btn-close text-reset btn-light" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="menuList">
                                <a href="" class="text-decoration-none">
                                    <li class="text-light font-weight-bold">Home Page</li>
                                </a>
                                <hr class="text-light" />
                                <a href="" class="text-decoration-none">
                                    <li class="text-light font-weight-bold">Contact Us</li>
                                </a>
                                <hr class="text-light" />
                                <a href="{{route('privacy')}}" class="text-decoration-none">
                                    <li class="text-light font-weight-bold">Privacy Policy</li>
                                </a>

                                <hr class="text-light" />
                                <a href="https://play.google.com/store/apps/details?id=com.tailors.doctoria&hl=en" class="text-decoration-none justify-content-end">
                                    <li class="text-light font-weight-bold">
                                        <button class="download">
                                            <svg class="saveicon" stroke="currentColor" stroke-width="1.7"
                                                viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"
                                                    stroke-linejoin="round" stroke-linecap="round"></path>
                                            </svg>
                                            Download
                                        </button>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

            <div class="justify-content-between align-items-center moblieMenu">
                <div class="my-5">
                    <div class="">
                        <button class="Menubtn" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                            <img width="40" height="40" src="https://img.icons8.com/ios/ffffff/128/menu--v7.png"
                                alt="menu--v7" />
                        </button>
                    </div>

                    <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasRight"
                        aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <button type="button" class="btn-close text-reset btn-light" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="menuList">
                                <a href="" class="text-decoration-none">
                                    <li class="text-light font-weight-bold">Home Page</li>
                                </a>
                                <hr class="text-light" />
                                <a href="" class="text-decoration-none">
                                    <li class="text-light font-weight-bold">Contact Us</li>
                                </a>
                                <hr class="text-light" />
                                <a href="" class="text-decoration-none">
                                    <li class="text-light font-weight-bold">Privacy Policy</li>
                                </a>

                                <hr class="text-light" />
                                <a href="" class="text-decoration-none justify-content-end">
                                    <li class="text-light font-weight-bold">
                                        <button class="download">
                                            <svg class="saveicon" stroke="currentColor" stroke-width="1.7"
                                                viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"
                                                    stroke-linejoin="round" stroke-linecap="round"></path>
                                            </svg>
                                            Download
                                        </button>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid mb-5 privacyhead align-items-center">
        <h1 class="mb-5 text-center py-5 font-weight-bold align-items-center">
            Privacy and Policy
        </h1>
    </div>



        <div class="container text-right policyarabic" dir="ltr">

        <div class="row g-3">
            <div class="col-sm-1">
                <h1 class="text-left"> <a href="{{route('privacy')}}" class="text-decoration-none"><button
                    class="btn btn-outline-danger"><img width="30" height="30"
                        src="https://img.icons8.com/color/120/usa-circular.png" alt="usa-circular" />En</button></a>
        </h1>
        <div class="sidebarAr">
            <h2>المحتوى</h2>
            <a class="text-decoration-none text-dark w-100" href="#introduction">نظرة عامة</a>
            <a class="text-decoration-none text-dark w-100" href="#information">ما يهم المستخدم</a>
            <a class="text-decoration-none text-dark w-100" href="#usage">كيف نستخدم المعلومات</a>
            <a class="text-decoration-none text-dark w-100" href="#sharing">تفاعلات المستخدم مع التطبيق </a>
            <a class="text-decoration-none text-dark w-100" href="#rights">حقوقك بداخل التطبيق و اثناء استخدامه</a>
            <a class="text-decoration-none text-dark w-100" href="#security">الامن و الخصوصية</a>
            <a class="text-decoration-none text-dark w-100" href="#changes">تغيير السياسات</a>
            <a class="text-decoration-none text-dark w-100" href="#refund">سياسة استرداد الاموال</a>
        </div>
            </div>
            <div class="col-md-11">
                <div class="contentAr text-right" dir="rtl">
                    <section id="introduction">
                        <h1>المقدمة</h1>
                        <ol>
                            <li>
                                <p>
                                    باستخدام تطبيق دكتوريا بلس، يعتبر المستخدم موافقًا تلقائيًا على شروط وأحكام الاستخدام
                                    المذكورة هنا، إذا كنت لا توافق على هذه الشروط، يُرجى عدم استخدام التطبيق.
                                </p>
                            </li>
                            <li>
                                <p>
                                    يشترط للحصول على الخدمات الخاصة بالتطبيق التسجيل فيه وتعبئة البيانات بشكل صحيح وتقديم
                                    المعلومات الصحيحة الخاصة بالمستخدم.
                                </p>
                            </li>
                            <li>
                                <p>
                                    يتحمل متلقي الخدمة المسؤولية الكاملة عن صحة البيانات المدخلة من قبله في التطبيق وعن أية
                                    آثار قد تنتج عنها.
                                </p>
                            </li>
                        </ol>
                    </section>
                    <section id="information">
                        <h2>ما يهم المستخدم</h2>
                        <ol>
                            <li>
                                <p>
                                    يُحظر على المستخدمين استخدام تطبيق دكتوريا بلس بطرق تتسبب في إعاقة الخدمة أو إلحاق الضرر
                                    بالتطبيق أو أي شخص آخر، كما يُعتبر استخدام التطبيق مسؤولية المستخدم وحده، ويتعهد المستخدم
                                    بعدم استخدام التطبيق لأي غرض غير قانوني أو غير مشروع، كما يُخلي تطبيق دكتوريا بلس مسؤوليته
                                    عن أي استخدام غير قانوني للتطبيق من قبل المستخدمين، وقد يتخذ التطبيق الإجراءات القانونية
                                    اللازمة في حال انتهاك أي مستخدم للقوانين أو اللوائح السارية.
                                </p>
                            </li>
                            <li>
                                <p>
                                    يتحمل المستخدم المسؤولية الكاملة عن استخدامه لتطبيق دكتوريا بلس والمحتوى الذي يقدمه وعواقبه.
                                </p>
                            </li>
                            <li>
                                <p>
                                    يحتفظ تطبيق دكتوريا بلس بالحق في إنهاء حساب أي مستخدم ينتهك شروط الاستخدام دون إشعار مسبق.
                                </p>
                            </li>
                            <li>
                                <p>
                                    يوافق المستخدمون على تعويض وإعفاء تطبيق دكتوريا بلس وأصحابه ومسؤوليه عن أي خسائر أو أضرار
                                    تنشأ عن استخدامهم للتطبيق.
                                </p>
                            </li>
                            <li>
                                <p>
                                    يُحظر استخدام التطبيق من قبل الأشخاص القاصرين دون إشراف وموافقة ولي الأمر أو الوصي القانوني،
                                    ويتعهد المستخدمون بتقديم معلومات صحيحة حول العمر والهوية، وفي حال اكتشاف أي استخدام غير مصرح
                                    به للتطبيق من قبل قاصر، يحق للتطبيق اتخاذ الإجراءات القانونية اللازمة وحظر الحسابات
                                    المخالفة.
                                </p>
                            </li>
                        </ol>
                    </section>
                    <section id="usage">
                        <h2>كيف نستخدم المعلومات</h2>
                        <ol>
                            <li>
                                <p>
                                    يتطلب دفع الرسوم مقدمًا عند طلب الخدمة، وتُوضح الرسوم بوضوح في التطبيق أثناء عملية الطلب.
                                </p>
                            </li>
                            <li>
                                <p>
                                    يتعين على المستخدم التحقق من مطابقة بيانات مقدم الخدمة للرعاية الصحية المنزلية، بما في ذلك
                                    الشخص والاسم كما هو معروض في بطاقته الشخصية، مع البيانات التي تم عرضها عند اختيار مقدم
                                    الخدمة، ويكون ذلك من مسؤولية المستخدم بشكل كامل، ويتحمل المستخدم المسؤولية الكاملة عن أي عدم
                                    تطابق في البيانات وأي تبعات ناتجة عن ذلك.
                                </p>
                            </li>
                            <li>
                                <p>
                                    11. يجب على المستخدم الالتزام بحدود الخدمة المطلوبة التي تم تحديدها أثناء عملية حجز خدمة
                                    الرعاية المنزلية، بمجرد وصول مقدم الرعاية للموقع، لا يحق للمستخدم طلب خدمات إضافية غير تلك
                                    التي تمت الموافقة عليها مسبقًا أثناء الحجز.
                                </p>
                            </li>
                            <li>
                                <p>
                                    يُحظر على المستخدم التعامل مع مقدم الخدمة خارج نطاق التطبيق، ويجب عليه الاعتماد فقط على
                                    الاتصال والتفاعل مع مقدم الخدمة من خلال التطبيق المخصص.
                                </p>
                            </li>
        
                            <li>
                                <p>
                                    يُحظر على المستخدم التعامل مع مقدم الخدمة خارج نطاق التطبيق، ويجب عليه الاعتماد فقط على
                                    الاتصال والتفاعل مع مقدم الخدمة من خلال التطبيق المخصص.
                                </p>
                            </li>
                        </ol>
                    </section>
                    <section id="sharing">
                        <h2>تفاعلات المستخدم مع التطبيق</h2>
                        <ol>
                            <li>
                                <p>
                                    التطبيق غير مسؤول عن تصرفات مقدم الخدمة الفردية خارج نطاق الخدمة المقدمة عبر التطبيق، بما في
                                    ذلك لكن دون الحصر التحرش أو السرقة.
                                </p>
                            </li>
                            <li>
                                <p>
                                    يجب على المستخدم توضيح تفاصيل الخدمة المطلوبة بشكل دقيق وواضح خلال عملية الحجز، والالتزام
                                    بتعبئة جميع البيانات والحقول المطلوبة في نموذج الحجز، ويتحمل المستخدم مسؤولية صحة ودقة
                                    البيانات التي يقدمها، ويتعهد بتقديم معلومات صحيحة وكاملة بما يتماشى مع الخدمة المطلوبة.
                                </p>
                            </li>
                            <li>
                                <p>
                                    يحتفظ تطبيق دكتوريا بلس بالحق بتغيير سياسة الخدمات والاسعار دون اشعار مسبق مع اخطار
                                    المستخدمين باي تغيرات عبر التطبيق.
                                </p>
                            </li>
                        </ol>
                    </section>
                    <section id="rights">
                        <h2>حقوقك بداخل التطبيق و اثناء استخدامه</h2>
                        <ol>
                            <li>
                                <p>
                                    إذا كنت ترغب في طلب أي خدمة يتم توفيرها من خلال التطبيق، قد يُطلب منك تقديم بعض المعلومات
                                    ذات الصلة بعملية شراء الخدمة الخاصة بك، بما في ذلك، على سبيل المثال لا الحصر، رقم بطاقة
                                    الائتمان الخاصة بك وتاريخ انتهاء صلاحيتها وعلى المستخدم ان يقر ويتعهد بما يلي:
        
                                <ul>
                                    <li>
                                        <p>أنه يمتلك الحق القانوني في استخدام أي بطاقة ائتمان أو طريقة دفع أخرى فيما يتعلق بأي
                                            عملية شراء </p>
                                    </li>
                                    <li>
                                        <p>أن المعلومات التي يزود بها صحيحة ومكتملة. </p>
                                    </li>
                                </ul>
                                </p>
                            </li>
                            <li>
                                <p>يحتفظ تطبيق دكتوريا بلس بحق رفض أو إلغاء طلب المستخدم في أي وقت ولأسباب غير محددة، بما في
                                    ذلك، على سبيل المثال لا الحصر، عدم توافر الخدمة، أو وجود أخطاء في الوصف أو السعر، أو في حالة
                                    حدوث خطأ في الطلب، أو لأسباب أخرى، وفي حالة استرداد المبالغ المدفوعة فانه يتم ذلك فقط من
                                    خلال طريقة الدفع الأصلية.</p>
                            </li>
                            <li>
                                <p>الشروط الخاصة بالزيارات المنزلية:
                                <ul>
                                    <li>
                                        <p>في حال طلب المستخدم مقدم رعاية طبية أنثى للمنزل يلزم عليه تواجد أنثى بالمنزل بعمر لا
                                            يقل عن 18 عام. </p>
                                    </li>
                                    <li>
                                        <p>يلزم المستخدم على دفع مبلغ الزيارة كاملاً في حال وصول مقدم الخدمة للموقع وانتظاره 10
                                            دقائق أمام الباب. </p>
                                    </li>
                                    <li>
                                        <p>يحق للمستخدم عند تقديم طلب زيارة رعاية منزلية الغاء الطلب بمدة اقصاها 12 ساعة قبل
                                            الموعد مع الاحتفاظ بالمبلغ المدفوع كرصيد.</p>
                                    </li>
        
                                    <li>
                                        <p>في حال الغاء المستخدم لموعد زيارة الرعاية المنزلية قبل موعد الزيارة بـ 11 ساعة يستحق
                                            مقدم الخدمة المبلغ كاملاً.</p>
                                    </li>
                                </ul>
                                </p>
                            </li>
                        </ol>
                    </section>
                    <section id="security">
                        <h2>الامن و الخصوصية</h2>
                        <ol>
                            <li>
                                <p>تطبيق دكتوريا بلس يلتزم بحماية خصوصية المستخدمين وسرية بياناتهم الشخصية وفقًا للتشريعات
                                    واللوائح ذات الصلة، كما يحتفظ التطبيق بالحق في استخدام معلومات المستخدمين لأغراض البحث
                                    والتحليل الإحصائي بهدف تحسين الخدمات الخاصة به. </p>
                            </li>
                            <li>
                                <p>نود التأكيد على أن المعلومات المقدمة عبر التطبيق تهدف إلى تقديم معلومات إرشادية فقط، ولا
                                    ينبغي اعتبارها بديلاً عن الرعاية الطبية المهنية. </p>
                            </li>
                            <li>
                                <p>استخدام الخدمة يقع على مسؤولية المستخدم الشخصية، حيث يتم تقديم الخدمة على أساس "كما هي" و
                                    "كما هو متاح"، دون أي ضمانات من أي نوع، سواء كانت صريحة أو ضمنية، وبموجب هذا البند، لا يمكن
                                    ضمان أن الخدمة ستعمل دون انقطاع أو آمنة أو متوافرة في أي وقت أو موقع معين، كما لا يمكن ضمان
                                    تصحيح أي أخطاء أو عيوب، ولا يمكن ضمان أن نتائج استخدام الخدمة ستلبي الاحتياجات الخاصة
                                    بالمستخدم. </p>
                            </li>
                        </ol>
                    </section>
                    <section id="changes">
                        <h2>تغيير السياسات</h2>
                        <ol>
                            <li>
                                <p>يحتفظ تطبيق دكتوريا بلس بالحق في تحديث سياسة الشروط والأحكام بشكل دوري، وسيتم نشر أي تغييرات
                                    على التطبيق للتأكيد على التزامنا بالسياسة.
                                </p>
                            </li>
                            <li>
                                <p>تخضع هذه الشروط وتُفسر وفقاً لقوانين جمهورية مصر العربية، وان الفشل في إنفاذ أي حق أو حكم من
                                    هذه الشروط لا يعتبر بأي شكل من الأشكال تنازلاً عن هذه الحقوق، إذا تم اعتبار أي بند من هذه
                                    الشروط غير صالح أو غير قابل للتنفيذ من قبل المحكمة، فستظل الأحكام المتبقية من هذه الشروط
                                    سارية.</p>
                            </li>
                            <li>
                                <p>يحتفظ تطبيق دكتوريا بلس بالحق في توقف أو تعليق الخدمات المقدمة عبر التطبيق لأغراض الصيانة
                                    والتحديث، وسنعمل جاهدين على تقديم إشعار مسبق للمستخدمين في حال حدوث ذلك.</p>
                            </li>
                            <li>
                                <p>يلتزم تطبيق دكتوريا بلس بالامتثال لجميع القوانين واللوائح السارية في البلدان التي نقدم فيها
                                    خدماتنا، ونحترم القوانين الدولية ذات الصلة.
                                </p>
                            </li>
        
                            <li>
                                <p>نوفر وسائل الاتصال للمستخدمين لتقديم التعليقات والاستفسارات والشكاوى، ونلتزم بالرد بأسرع وقت
                                    ممكن على جميع الاستفسارات.</p>
                            </li>
                        </ol>
                    </section>
                    <section id="refund">
                        <h2>سياسة استرداد الاموال</h2>
                        <ol>
                            <li>
                                <p> الزيارات المنزلية:</p>
                                <ul>
                                    <li>
                                        <p>يلزم المستخدم على دفع مبلغ الزيارة كاملاً في حال وصول مقدم الخدمة للموقع
                                            وانتظاره 10 دقائق أمام الباب.
                                        </p>
                                    </li>
                                    <li>
                                        <p>يحق للمستخدم عند تقديم طلب زيارة رعاية منزلية الغاء الطلب بمدة اقصاها 12 ساعة
                                            قبل الموعد مع الاحتفاظ بالمبلغ المدفوع كرصيد.
                                        </p>
                                    </li>
                                    <li>
                                        <p>في حال الغاء المستخدم لموعد زيارة الرعاية المنزلية قبل موعد الزيارة بـ 11
                                            ساعة يستحق مقدم الخدمة المبلغ كاملاً.
                                        </p>
                                    </li>
                                </ul>


                            </li>

                            <li>
                                <p>الكشف اونلاين:</p>
                                <ul>

                                    <li>
                                        <p>يلزم المستخدم على دفع مبلغ الكشف كاملاً في حال وجود مقدم الخدمة سواء الكشف
                                            لدي متخصص او استشارة فورية وانتظاره 10 دقائق </p>
                                    </li>
                                    <li>
                                        <p>يحق للمستخدم الغاء الطلب الكشف اون لاين لدي الطبيب المتخصص بمدة اقصاها 12
                                            ساعة قبل الموعد مع الاحتفاظ بالمبلغ المدفوع كرصيد.</p>
                                    </li>

                                    <li>
                                        <p>يحق للمستخدم في حالة الكشف اون لاين لدي الطبيب المتخصص او استشارة فورية ولم
                                            يتوفر طبيب في مده لاتزيد عن 10 دقائق الاحتفاظ بالمبلغ المدفوع كرصيد.</p>
                                    </li>
                                    <li>
                                        <p>في حال الغاء المستخدم لموعد الحجز لدي المتخصص قبل موعد الزيارة بـ 11 ساعة
                                            يستحق مقدم الخدمة المبلغ كاملاً</p>
                                    </li>

                                </ul>
                            </li>
                        </ol>
                    </section>
                </div>
            </div>

        </div>
        
    </div>

    <footer class="bg-dark py-2 text-center">
        <p class="text-light pt-2">Doctoria-plus &#169; 2024</p>
    </footer>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="Doctoria.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        var swiper = new Swiper(".swiper-container", {
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            loop: true,
        });
    </script>
    <script>
        AOS.init({
            offset: 200, // Offset (in px) from the original trigger point
            duration: 300, // Duration of animation (in ms)
            easing: "ease-in-out-sine", // Easing function
            delay: 100, // Delay before the animation starts (in ms)
            once: true, // Whether animation should happen only once - while scrolling down
            mirror: false, // Whether elements should animate out while scrolling past them
        });
    </script>
        <script>
        // script.js
window.addEventListener('scroll', function() {
    var sidebar = document.getElementById('sidebarAr');
    var stopElement = document.getElementById('section2'); // The element where the sidebar should stop
    
    var sidebarRect = sidebar.getBoundingClientRect();
    var stopElementRect = stopElement.getBoundingClientRect();

    if (stopElementRect.top <= sidebarRect.bottom) {
        sidebar.style.position = 'absolute';
        sidebar.style.top = (stopElementRect.top - sidebarRect.height) + 'px';
    } else {
        sidebar.style.position = 'fixed';
        sidebar.style.top = '0';
    }
});

    </script>
</body>

</html>
