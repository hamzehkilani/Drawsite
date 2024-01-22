<div>
    <link rel="stylesheet" href="{{ asset('../css/request.css') }}">
    <div class="d-flex justify-content-center">
        <div class="d-flex firstection">
            <h1 class="h1header">طلب اشتراك جديد</h1>
            <h6>الرجاء ادخال المعلومات المطلوبة ادناه مع مراعاة تعبئة الحقول المطلوبة </h6>
            <div class="d-flex" id="progressbar2" style="flex-direction: row-reverse;">
                <div class="{{ $shownumber == 1 ? 'activereq' : ($shownumber > 1 ? 'unactivebuttun' : '') }} flex-iteam">
                    <a class="{{ $shownumber == 1 ? 'aactive' : ($shownumber > 1 ? 'unactive' : '') }}  "
                        href="javascript:void">بيانات الطلب</a>
                </div>
                <div
                    class="{{ $shownumber == 2 ? 'activereq' : ($shownumber > 2 ? 'unactivebuttun' : '') }} flex-iteam">
                    <a class="{{ $shownumber == 2 ? 'aactive' : ($shownumber > 2 ? 'unactive' : 'unactive1') }} "
                        href="javascript:void">المعلومات الشخصية</a>
                </div>
                <div
                    class="{{ $shownumber == 3 ? 'activereq' : ($shownumber > 3 ? 'unactivebuttun' : '') }} flex-iteam">
                    <a class="{{ $shownumber == 3 ? 'aactive' : ($shownumber > 3 ? 'unactive' : 'unactive1') }} "
                        href="javascript:void">تفاصيل العنوان</a>
                </div>
                <div
                    class="{{ $shownumber == 4 ? 'activereq' : ($shownumber > 4 ? 'unactivebuttun' : '') }} flex-iteam">
                    <a class="{{ $shownumber == 4 ? 'aactive' : ($shownumber > 4 ? 'unactive' : 'unactive1') }} "
                        href="javascript:void">المرفقات</a>
                </div>
            </div>
            @if ($shownumber == 1)
                <fieldset>

                    <div class="subscribe_div1">
                        <h3>بيانات الطلب</h3>
                        <div id="ContentPlaceHolder1_ctl00_UpdatePanel3">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>نوع الطلب</label>
                                    <select name="" onchange="showdataentry()"
                                        id="ContentPlaceHolder1_ctl00_ddlRequestInquiry" tabindex="2"
                                        style="width:100%;" class="value" wire:model="request_type">
                                        <option selected="selected" value="0">الرجاء اختيار نوع الطلب.</option>
                                        <option value="1">مجموعة عدادات </option>
                                        <option value="2">عداد واحد دائم</option>
                                        <option value="3">عداد مؤقت</option>
                                        <option value="4">عداد تجاري محجوز</option>
                                        <option value="5">مؤقت الى دائم</option>
                                    </select>
                                </div>
                            </div>
                            <div id="divotherDrops">
                                <div class="row" style="
                                width: 600px;">
                                    <div class="col-lg-6 col-md-6 col-sm-6" id="TypeRequest">
                                        <div class="form-group">
                                            <label>تعرفة الاشتراك</label>
                                            <select name="ctl00$ContentPlaceHolder1$ctl00$ddlTypeRequest"
                                                id="ContentPlaceHolder1_ctl00_ddlTypeRequest" tabindex="2"
                                                style="width:100%;">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>نوع النشاط</label>
                                            <select name="ctl00$ContentPlaceHolder1$ctl00$ddlTypeActivity"
                                                id="ContentPlaceHolder1_ctl00_ddlTypeActivity" tabindex="2"
                                                style="width:100%;">
                                                <option value="0">نوع النشاط</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </fieldset>
                <div style="display: none" id="forval1">
                    <div class="iteams">
                        <div class="iteam-text"> <strong>1</strong> <strong>فاز</strong> </div>
                        <div class="display-flex-dirction-column">
                            <label for="imnber" class="imnber"> العدد</label>
                            <input type="text" class="forlabelsdisplaynone" placeholder="العدد" wire:model="faz1">
                        </div>
                    </div>
                    <div class="iteams">
                        <div class="iteam-text"> <strong>3</strong> <strong>فاز</strong> </div>
                        <div class="display-flex-dirction-column">
                            <label for="imnber" class="imnber"> العدد</label>
                            <input type="text" class="forlabelsdisplaynone" placeholder="العدد" wire:model="faz3">
                        </div>
                    </div>
                    <div class="iteams">
                        <div class="iteam-text"> <strong>عداد خدمات </strong> <strong>1</strong> <strong>فاز </strong>
                        </div>

                        <div class="display-flex-dirction-row">
                            <div class="display-flex-dirction-column">
                                <label for="imnber" class="imnber"> العدد</label>
                                <input type="text" class="forlabelsdisplaynone" placeholder="العدد"
                                    wire:model="request_value_1faz">
                            </div>

                            <div class="display-flex-dirction-column">
                                <label for="imnber" class="imnber"> قوة الامبير</label>
                                <input type="text" class="forlabelsdisplaynone" placeholder="قوة الامبير"
                                    wire:model="imber_power1">
                            </div>
                        </div>
                    </div>


                    <div class="iteams">
                        <div class="iteam-text"> <strong>عداد خدمات </strong> <strong>3</strong> <strong>فاز </strong>
                        </div>

                        <div class="display-flex-dirction-row">
                            <div class="display-flex-dirction-column">
                                <label for="imnber" class="imnber"> العدد</label>
                                <input type="text" class="forlabelsdisplaynone" placeholder="العدد"
                                    wire:model="request_value_3faz">
                            </div>

                            <div class="display-flex-dirction-column">
                                <label for="imnber" class="imnber"> قوة الامبير</label>
                                <input type="text" class="forlabelsdisplaynone" placeholder="قوة الامبير"
                                    wire:model="imber_power3">
                            </div>
                        </div>
                    </div>
                </div>

                <input type="button" name="next" class="next action-button" value="التالي"
                    wire:click="next(1)">
            @endif

            @if ($shownumber == 2)
                <div class="container mt-5">
                    <div class="row" style="flex-direction: row-reverse;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="documentNumber"><span style="color: red">*</span> الاسم الاول</label>
                                <input type="text" class="form-control custominput" id="documentNumber"
                                    placeholder="الاسم الاول" wire:model="f_name">
                                @error('f_name')
                                    <span class="error">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName"><span style="color: red">*</span> الاسم الثاني</label>
                                <input type="text" class="form-control custominput" id="firstName"
                                    wire:model="s_name" placeholder="* الاسم الثاني">
                                @error('s_name')
                                    <span class="error">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName"><span style="color: red">*</span> الاسم الجد</label>
                                <input type="text" class="form-control custominput" id="firstName"
                                    wire:model="t_name" placeholder="* الاسم الجد">
                                @error('t_name')
                                    <span class="error">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="documentNumber"> <span style="color: red">*</span> اسم العائلة</label>
                                <input type="text" class="form-control custominput" wire:model="l_name"
                                    placeholder=" اسم العائلة">
                                @error('l_name')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="documentNumber"> <span style="color: red">*</span> عنوان البريد
                                    الالكترونى</label>
                                <input type="text" class="form-control custominput" wire:model="email"
                                    placeholder="*  عنوان البريد الالكترونى">
                                @error('email')
                                    <span class="error">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                    </div>


                    <div class="row" style="flex-direction: row-reverse;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName"><span style="color: red">*</span> الجنسية</label>
                                <select name="ctl00$ContentPlaceHolder1$ctl00$ddlTypeActivity"
                                    id="ContentPlaceHolder1_ctl00_ddlTypeActivitys" tabindex="2"
                                    style="width:100%;">
                                    <option value="0">أختيار الجنسية</option>
                                    <option value="1">أردنيه</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="documentNumber"><span style="color: red">*</span> رقم الموبايل</label>
                                <input type="text" class="form-control custominput" wire:model="phone"
                                    placeholder="* رقم الموبايلل">
                                @error('phone')
                                    <span class="error">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName"><span style="color: red">*</span> نوع الوثيقة</label>
                                <select name="ctl00$ContentPlaceHolder1$ctl00$ddlTypeActivity"
                                    id="ContentPlaceHolder1_ctl00_ddlTypeActivitys" tabindex="2"
                                    style="width:100%;" wire:model="auckland_type">
                                    <option selected="selected" value="0">الرجاء اختيار نوع الوثيقة</option>
                                    <option value="1">هوية أحوال مدنية</option>
                                    <option value="2">جواز سفر</option>
                                    <option value="3">اقامة</option>
                                    <option value="9">الرقم الوطني للمنشأة</option>

                                </select>
                                @error('auckland_type')
                                    <span class="error">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="documentNumber"> <span style="color: red">*</span> رقم الوثيقة</label>
                                <input type="text" class="form-control custominput" wire:model="document_number"
                                    placeholder="*  رقم الوثيقة">
                                @error('document_number')
                                    <span class="error">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                    </div>


                </div>
                <div class="d-flex">
                    <input type="button" name="next" class="next action-button" value="التالي"
                        wire:click="next(2)">
                    <input type="button" name="next" class="next action-button" value="السابق"
                        wire:click="prev(2)">
                </div>
            @endif

            @if ($shownumber == 3)
                <fieldset id="subscribe_div3_" style="display: block; opacity: 1;">
                    <div class="subscribe_div3">
                        <h3
                            style="    text-align: end;
                        margin-top: 33px;
                        color: #0d6efd;">
                            تفاصيل العنوان</h3>
                        <div>
                            <div class="row" style="flex-direction: row-reverse;">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label><span style="color: red">*</span> المحافظة</label>
                                        <select tabindex="2" style="width:100%;"
                                            id="ContentPlaceHolder1_ctl00_ddlTypeActivitys" wire:model="governorate">
                                            <option selected="selected" value="0">اختيار المحافظة</option>

                                            <option value="9">الزرقاء</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label><span style="color: red">*</span> المنطقة</label>
                                        <select tabindex="2" style="width:100%;"
                                            id="ContentPlaceHolder1_ctl00_ddlTypeActivitys" wire:model="placement">>
                                            <option selected="selected" value="0"> اختيار المنطقة</option>
                                            <option value="0"> اختيار المنطقة</option>
                                            <option value="160">معصوم</option>
                                            <option value="161">النزهة</option>
                                            <option value="162">عوجان</option>
                                            <option value="163">حي الامير محمد</option>
                                            <option value="164">صروت</option>
                                            <option value="165">ام المكمان</option>
                                            <option value="166">ام رمانة</option>
                                            <option value="167">ام الزيغان</option>
                                            <option value="168">الرصيفة</option>
                                            <option value="169">الشمالي</option>
                                            <option value="170">القادسية</option>
                                            <option value="171">جناعة</option>
                                            <option value="172">حي الضباط</option>
                                            <option value="173">جبل طارق</option>
                                            <option value="174">حي الحسين</option>
                                            <option value="175">حي شاكر</option>
                                            <option value="176">حي معصوم</option>
                                            <option value="177">النقب</option>
                                            <option value="178">المشيرفة</option>
                                            <option value="179">الظليل</option>
                                            <option value="180">الحلابات</option>
                                            <option value="181">حي الرشيد</option>
                                            <option value="182">مخيم حطين</option>
                                            <option value="183">حي رمزي</option>
                                            <option value="184">الغويرية</option>
                                            <option value="185">اسكان طلال</option>
                                            <option value="186">الزواهرة</option>
                                            <option value="187">العراتفة</option>
                                            <option value="188">الجبل الابيض</option>
                                            <option value="189">جبل فيصل</option>
                                            <option value="190">حي الجندي</option>
                                            <option value="191">وادي العش</option>
                                            <option value="192">ضاحية مكة</option>
                                            <option value="193">ضاحية المدينة</option>
                                            <option value="194">ضاحية القدس</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="flex-direction: row-reverse;">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>اسم الشارع</label>
                                    <input type="text" class="custominput" placeholder="اسم الشارع"
                                        wire:model="street_name">

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>رقم البناية</label>
                                    <input type="text" class="custominput" placeholder="رقم البناية"
                                        wire:model="building_number">

                                </div>
                            </div>

                        </div>
                        <div class="row" style="flex-direction: row-reverse;">

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>أقرب معلم موجود</label>
                                    <input type="text" class="custominput" placeholder="أقرب معلم موجود"
                                        wire:model="the_nearest_landmark_is_available">

                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="d-flex">
                    <input type="button" name="next" class="next action-button" value="التالي"
                        wire:click="next(3)">
                    <input type="button" name="next" class="next action-button" value="السابق"
                        wire:click="prev">
                </div>
            @endif
            @if ($shownumber == 4)
                <fieldset style="display: block; opacity: 1;">
                    <form action="{{ route('user.updaterequest') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="subscribe_div4">
                        <h3>المرفقات</h3>
                        <h2 class="clslinklbl">يمكنكم تحميل نماذج المطلوبة في حال دعت الحاجة من هنا <a
                                href="/App_Themes/ThemeAr/img/نموذج التعهد.pdf" download="">(نموذج تعهد مؤقت )</a>
                            <a href="/App_Themes/ThemeAr/img/1.doc" download="">(نموذج موافقة مالك)</a> و <a
                                href="/App_Themes/ThemeAr/img/نموذج الأحمال الكهربائية.pdf" download="">(نموذج
                                أحمال)</a></h2>
                        <div class="row allrow">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="row styleforallrows">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <aside>
                                            <label id="lblnameFile1">سند تسجيل</label>
                                        </aside>
                                        <small>بحجم أقصى 2 ميجابايت (jpg)</small>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="file-upload">
                                            <label for="fileuploadfield_1" class="file-upload__label fieldlabels">
                                                تحميل الصور
                                                <img src="https://www.jepco.com.jo/App_Themes/ThemeAr/img/upload.png" alt="">
                                            </label>
                                            <input id="fileuploadfield_1" name="fileuploadfield_1" type="file"
                                                class="file-upload__input" wire >
                                            <span class="file-select">No file selected</span>
                                            
                                            <br>
                                            @error('fileuploadfield_1') <span class="error" style="color: red">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row styleforallrows">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <aside>
                                            <label id="lblnameFile2">مخطط أراضي</label>
                                        </aside>
                                        <small>بحجم أقصى 2 ميجابايت (jpg)</small>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="file-upload">
                                            <label for="fileuploadfield_2" class="file-upload__label fieldlabels">
                                                تحميل الصور
                                                <img src="https://www.jepco.com.jo/App_Themes/ThemeAr/img/upload.png" alt="">
                                            </label>
                                            <input id="fileuploadfield_2" name="fileuploadfield_2" type="file"
                                                class="file-upload__input">
                                            <span class="file-select">No file selected</span>
                                            <br>
                                            @error('fileuploadfield_2') <span class="error" style="color: red">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row styleforallrows">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <aside>
                                            <label id="lblnameFile3">مخطط موقع</label>
                                        </aside>
                                        <small>بحجم أقصى 2 ميجابايت (jpg)</small>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="file-upload">
                                            <label for="fileuploadfield_3" class="file-upload__label fieldlabels">
                                                تحميل الصور
                                                <img src="https://www.jepco.com.jo/App_Themes/ThemeAr/img/upload.png" alt="">
                                            </label>
                                            <input id="fileuploadfield_3" name="fileuploadfield_3" type="file"
                                                class="file-upload__input">
                                            <span class="file-select">No file selected</span>
                                            <br>
                                            @error('fileuploadfield_3') <span class="error" style="color: red">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row styleforallrows">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <aside>
                                            <label id="lblnameFile4">هوية طالب الاشتراك</label>
                                        </aside>
                                        <small>بحجم أقصى 2 ميجابايت (jpg)</small>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="file-upload">
                                            <label for="fileuploadfield_4" class="file-upload__label fieldlabels">
                                                تحميل الصور
                                                <img src="https://www.jepco.com.jo/App_Themes/ThemeAr/img/upload.png" alt="">
                                            </label>
                                            <input id="fileuploadfield_4" name="fileuploadfield_4" type="file"
                                                class="file-upload__input">
                                            <span class="file-select">No file selected</span>
                                            <br>
                                            @error('fileuploadfield_4') <span class="error" style="color: red">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row styleforallrows" id="divfile5">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <aside>
                                            <label id="lblnameFile5">اذن اشغال</label>
                                        </aside>
                                        <small>بحجم أقصى 2 ميجابايت (jpg)</small>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="file-upload">
                                            <label for="fileuploadfield_5" class="file-upload__label fieldlabels">
                                                تحميل الصور
                                                <img src="https://www.jepco.com.jo/App_Themes/ThemeAr/img/upload.png" alt="">
                                            </label>
                                            <input id="fileuploadfield_5" name="fileuploadfield_5" type="file"
                                                class="file-upload__input">
                                            <span class="file-select">No file selected</span>
                                            <br>
                                            @error('fileuploadfield_5') <span class="error" style="color: red">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>



                                <div class="row styleforallrows" id="divfile6" style="">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <aside>
                                            <label id="lblnameFile6">تعبئة نموذج الاحمال وتحديد الحمل الدائم المطلوب
                                                والتوقيع على النموذج</label>
                                        </aside>
                                        <small>بحجم أقصى 1 ميجابايت (jpg)</small>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="file-upload">
                                            <label for="fileuploadfield_6" class="file-upload__label fieldlabels">
                                                تحميل الصور
                                                <img src="https://www.jepco.com.jo/App_Themes/ThemeAr/img/upload.png" alt="">
                                            </label>
                                            <input id="fileuploadfield_6" name="fileuploadfield_6" type="file"
                                                class="file-upload__input">
                                            <span class="file-select">No file selected</span>
                                            <br>
                                            @error('fileuploadfield_6') <span class="error" style="color: red">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row styleforallrows" id="divfile7" style="">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <aside>
                                            <label id="lblnameFile7">سجل التجاري الخاص بشركات الإسكان</label>
                                        </aside>
                                        <small>بحجم أقصى 1 ميجابايت (jpg)</small>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="file-upload">
                                            <label for="fileuploadfield_7" class="file-upload__label fieldlabels">
                                                تحميل الصور
                                                <img src="https://www.jepco.com.jo/App_Themes/ThemeAr/img/upload.png" alt="">
                                            </label>
                                            <input id="fileuploadfield_7" name="fileuploadfield_7" type="file"
                                                class="file-upload__input">
                                            <span class="file-select">No file selected</span>
                                            <br>
                                            @error('fileuploadfield_7') <span class="error" style="color: red">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="divagree">
                            <input class="form-check-input" type="checkbox" value="agree" id="agree">
                            <label>أقر بأن جميع المعلومات المقدمة أعلاه صحيحة وأتحمل كافة المسؤولية</label>
                        </div>

                    </div>
                    <button class="btn action-button" type="submit" id="btbvalid" >ارسال
                        الطلب</button>
                    </form>
                </fieldset>
            @endif



        </div>
    </div>

</div>



@section('scripts')
    <script>
        function showdataentry() {
            var value = $(".value").val();
            console.log(value);

            // Convert value to a number or compare it with the string '1'
            if (value === '1') {
                $("#forval1").show();
                $("#divotherDrops").hide();
            } else {
                $("#forval1").hide();
                $("#divotherDrops").show();

            }
        }
    </script>
@endsection
</div>
