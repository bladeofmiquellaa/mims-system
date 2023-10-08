@extends('home.layouts.master')
@section('content')
    <title>جست جو پیشرفته</title>
<div class="adv-Search container">
    <div class="adv-Search-header">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10a2 2 0 1 0 4 0a2 2 0 0 0-4 0m2-6v4m0 4v8m6-6a2 2 0 0 0-1.042 3.707M12 4v10m4-7a2 2 0 1 0 4 0a2 2 0 0 0-4 0m2-3v1m0 4v2m-3 7a3 3 0 1 0 6 0a3 3 0 1 0-6 0m5.2 2.2L22 22"/></svg></svg>
            جست و جوی پیشرفته
        </div>
        <svg class="clear" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" d="M10 4a2 2 0 1 1 4 0v6h6v4H4v-4h6V4ZM4 14h16v8H4v-8Zm12 8v-5.635M8 22v-5.635M12 22v-5.635"/></svg>
    </div>


    <div class="adv-Search-main">

        <div class="adv-Search-input row">

            <div class="col-md-6">
                <label >عنوان</label>
                <input type="text" name="title" >
            </div>
            <div class="col-md-6">
                <label>نام پزشک</label>
                <input type="text" name="DoctorName">
            </div>

            <div class="col-md-6">
                <label>محل ایجاد پرونده</label>
                <input type="text" name="Location">
            </div>
            <div class="col-md-6">
                <label>سن بیمار</label>
                <input type="number" name="age">
            </div>
            <div class="col-md-6">
                <ul style="padding: 0%; margin: 0%;width: 100%">
                    <li class="menu" id="gender">
                        <a><Span>انتخاب جنسیت</Span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 14.95q-.2 0-.375-.062t-.325-.213l-4.6-4.6q-.275-.275-.275-.7t.275-.7q.275-.275.7-.275t.7.275l3.9 3.9l3.9-3.9q.275-.275.7-.275t.7.275q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213T12 14.95Z"/></svg>
                            <svg style="display: none;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g transform="rotate(180 12 12)"><path fill="currentColor" d="M12 14.95q-.2 0-.375-.062t-.325-.213l-4.6-4.6q-.275-.275-.275-.7t.275-.7q.275-.275.7-.275t.7.275l3.9 3.9l3.9-3.9q.275-.275.7-.275t.7.275q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213T12 14.95Z"/></g></svg>
                        </a>

                        <ul  class="submenu" style="z-index: 2;">
                            <li>مرد</li>
                            <li>زن</li>
                            <li>انتخاب جنسیت</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul style="padding: 0%; margin: 0%;width: 100%;">
                    <li class="menu" id="organ-list">
                        <a><Span>انتخاب ارگان بدن</Span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 14.95q-.2 0-.375-.062t-.325-.213l-4.6-4.6q-.275-.275-.275-.7t.275-.7q.275-.275.7-.275t.7.275l3.9 3.9l3.9-3.9q.275-.275.7-.275t.7.275q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213T12 14.95Z"/></svg>
                            <svg style="display: none;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g transform="rotate(180 12 12)"><path fill="currentColor" d="M12 14.95q-.2 0-.375-.062t-.325-.213l-4.6-4.6q-.275-.275-.275-.7t.275-.7q.275-.275.7-.275t.7.275l3.9 3.9l3.9-3.9q.275-.275.7-.275t.7.275q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213T12 14.95Z"/></g></svg>
                        </a>

                        <ul  class="submenu" style="z-index: 2;">
                            <li>مغز</li>
                            <li>قلب</li>
                            <li>ریه</li>
                            <li>معده</li>
                            <li>جگر</li>
                            <li>لوزالمعده</li>
                            <li>روده</li>
                            <li>کلیه</li>
                            <li>طحال</li>
                            <li>مثانه</li>
                            <li>چشم</li>
                            <li>گوش</li>
                            <li>بینی</li>
                            <li>زبان</li>
                            <li>آلت تناسلی مرد</li>
                            <li>بیضه</li>
                            <li>پروستات</li>
                            <li>کلیتوریس</li>
                            <li>تخمدان</li>
                            <li>رحم</li>
                            <li>پوست</li>
                            <li>استخوان</li>
                            <li>عضلات</li>
                            <li>دندان</li>
                            <li>انتخاب ارگان بدن</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul style="padding: 0%; margin: 0;width: 100%">
                    <li class="menu" id="category">
                        <a><Span>انتخاب کتگوری</Span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 14.95q-.2 0-.375-.062t-.325-.213l-4.6-4.6q-.275-.275-.275-.7t.275-.7q.275-.275.7-.275t.7.275l3.9 3.9l3.9-3.9q.275-.275.7-.275t.7.275q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213T12 14.95Z"/></svg>
                            <svg style="display: none;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g transform="rotate(180 12 12)"><path fill="currentColor" d="M12 14.95q-.2 0-.375-.062t-.325-.213l-4.6-4.6q-.275-.275-.275-.7t.275-.7q.275-.275.7-.275t.7.275l3.9 3.9l3.9-3.9q.275-.275.7-.275t.7.275q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213T12 14.95Z"/></g></svg>
                        </a>

                        <ul  class="submenu">
                            @foreach($categories as $category)
                                <li>{{$category['name']}}</li>
                            @endforeach
                            <li>انتخاب کتگوری</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul style="padding: 0%; margin: 0;width: 100%;">
                    <li class="menu" id="sub-cat" style="opacity: 50%;pointer-events: none;">
                        <a><Span>انتخاب ساب کتگوری</Span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 14.95q-.2 0-.375-.062t-.325-.213l-4.6-4.6q-.275-.275-.275-.7t.275-.7q.275-.275.7-.275t.7.275l3.9 3.9l3.9-3.9q.275-.275.7-.275t.7.275q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213T12 14.95Z"/></svg>
                            <svg style="display: none;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g transform="rotate(180 12 12)"><path fill="currentColor" d="M12 14.95q-.2 0-.375-.062t-.325-.213l-4.6-4.6q-.275-.275-.275-.7t.275-.7q.275-.275.7-.275t.7.275l3.9 3.9l3.9-3.9q.275-.275.7-.275t.7.275q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213T12 14.95Z"/></g></svg>
                        </a>

                        <ul class="submenu">

                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <label>سابقه بیماری</label>
                <input type="text" name="history">
            </div>

            <div class="col-md-6">
                <label>کد نظام پزشکی</label>
                <input type="number" name="MedicaCode">
            </div>

            <div class="col-md-6">
                <label>یافته ها</label>
                <textarea name="findings"></textarea>
            </div>

            <div class="col-md-6">
                <label>تشخیص پزشک</label>
                <textarea name="diagnosis"></textarea>
            </div>

            <div class="human-body">
                <img src="body.png" usemap="#image-map" style="filter: drop-shadow(4px 4px 4px gray);" >
                <map name="image-map">

                    <area alt="مرد" title="گوش"  coords="356,70,363,91" shape="rect">
                    <area alt="مرد" title="گوش"  coords="314,73,324,90" shape="rect">
                    <area alt="مرد" title="مغز"  coords="326,55,354,76" shape="rect">
                    <area alt="مرد" title="بینی"  coords="336,77,342,90" shape="rect">
                    <area alt="مرد" title="دندان"  coords="331,91,349,100" shape="rect">
                    <area alt="مرد" title="ریه"  coords="330,120 325,123 321,129 317,138 318,132 314,145 311,153 311,163 313,170 319,168 327,168 334,166 336,156 337,148 337,141 337,129 334,123 " shape="polygon">
                    <area alt="مرد" title="قلب"  coords="346,155,13" shape="circle">
                    <area alt="مرد" title="ریه"  coords="353,168 362,170 368,168 368,155 366,140 359,129 356,125 349,121 345,126 343,133 342,141 355,147 " shape="polygon">
                    <area alt="مرد" title="کبد"  coords="350,168 354,169 350,173 347,177 344,178 341,180 339,184 336,187 333,189 330,189 326,190 318,194 318,185 316,178 316,173 321,169 330,168 336,167 344,167 326,168 342,166 " shape="polygon">
                    <area alt="مرد" title="کیسه صفرا" coords="643,381,648,379,655,378,652,383,645,386" shape="poly">
                    <area alt="مرد" title="معده" coords="348,177 351,177 360,177 356,177 363,177 367,183 364,186 363,190 361,193 359,196 354,199 351,202 356,192 351,191 345,192 342,192 348,187 352,182 " shape="polygon">
                    <area alt="مرد" title="لوز المعده" coords="345,202 340,204 335,206 333,204 331,201 333,197 337,194 342,194 348,195 354,193 356,196 352,199 348,201 " shape="polygon">
                    <area alt="مرد" title="کلیه" coords="359,196 361,197 363,201 364,204 360,206 356,208 353,206 350,201 353,199 357,197 " shape="polygon">
                    <area alt="مرد" title="کلیه" coords="326,207 323,208 320,206 317,206 318,202 321,199 327,198 328,202 " shape="polygon">
                    <area alt="مرد" title="روده ها" coords="363,205 366,210 367,217 366,227 367,240 368,232 368,246 361,252 360,256 351,254 349,251 344,251 339,248 335,249 332,247 328,242 327,242 324,244 320,247 315,246 310,242 311,239 312,236 314,223 314,215 313,231 312,220 312,215 312,213 314,209 316,206 323,205 327,208 331,209 335,211 359,208 351,209 344,210 " shape="polygon">
                    <area alt="مرد" title="بیضه ها" coords="350,277 348,277 347,279 345,276 345,272 350,271 352,274 " shape="polygon">
                    <area alt="مرد" title="بیضه ها" coords="333,277 336,275 336,271 333,270 330,271 329,273 328,278 " shape="polygon">
                    <area alt="مرد" title="آلت تناسلی مردانه" coords="335,263 335,268 337,272 336,278 336,284 341,287 344,282 344,275 344,271 345,267 344,263 340,261 " shape="polygon">
                    <area alt="مرد" title="مثانه" coords="338,263 341,264 344,263 348,258 348,254 348,252 340,251 340,251 337,251 335,251 334,252 333,256 335,262 " shape="polygon">
                    <area alt="مرد" title="کیسه صفرا" coords="323,190,3" shape="circle">

                    <area alt="زن" title="مغز" coords="151,99 154,99 159,93 155,87 153,84 148,80 142,80 138,80 134,84 132,89 134,93 140,96 147,97 " shape="polygon">
                    <area alt="زن" title="گوش" coords="167,113 171,111 175,107 177,101 175,97 171,96 169,95 166,99 166,101 167,104 167,107 167,111 " shape="polygon">
                    <area alt="زن" title="گوش" coords="121,114 125,113 125,108 126,102 125,98 122,96 118,97 116,100 116,106 118,112 " shape="polygon">
                    <area alt="زن" title="بینی" coords="144,106 143,109 147,109 149,109 148,107 147,104 147,99 144,101 " shape="polygon">
                    <area alt="زن" title="ریه" coords="139,186 142,185 143,180 144,174 144,168 144,161 142,153 138,142 135,145 134,146 132,149 130,151 129,154 127,158 125,160 123,167 120,172 120,177 121,185 123,190 132,189 " shape="polygon">
                    <area alt="زن" title="قلب" coords="152,189 158,191 159,189 159,187 159,182 160,178 160,173 158,168 154,165 150,165 147,166 145,170 142,177 144,182 144,184 146,189 " shape="polygon">
                    <area alt="زن" title="ریه" coords="147,159 148,155 149,153 152,152 154,147 155,144 162,146 166,156 170,163 173,171 175,181 175,191 170,192 165,192 158,189 158,183 159,177 159,170 158,166 156,166 149,163 " shape="polygon">
                    <area alt="زن" title="دندان" coords="156,120 157,115 155,112 152,113 147,113 142,112 137,112 135,115 137,121 142,123 150,123 " shape="polygon">
                    <area alt="زن" title="کبد" coords="160,190 158,190 151,190 145,190 140,189 135,187 132,188 129,190 125,196 125,202 126,206 125,211 125,215 132,211 140,208 147,205 149,202 154,197 160,194 " shape="polygon">
                    <area alt="زن" title="معده" coords="166,211 170,208 169,203 168,199 165,197 163,197 159,198 156,196 153,199 156,201 160,203 159,206 156,208 151,210 146,210 156,213 161,214 " shape="polygon">
                    <area alt="زن" title="لوز المعده" coords="143,224 147,223 152,221 152,221 157,220 163,214 158,214 154,215 151,213 149,212 147,212 145,213 142,214 139,218 139,222 " shape="polygon">
                    <area alt="زن" title="روده ها" coords="162,268 167,264 168,258 168,254 162,253 161,253 156,251 140,249 140,252 135,252 131,251 127,253 127,259 128,263 123,264 121,260 120,252 121,239 121,232 122,227 125,225 132,224 141,228 149,229 155,230 161,228 168,224 173,230 173,239 173,244 173,250 174,256 174,261 169,267 165,270 " shape="polygon">
                    <area alt="زن" title="تخمدان" coords="161,266,6" shape="circle">
                    <area alt="زن" title="تخمدان" coords="134,263,6" shape="circle">
                    <area alt="زن" title="رحم" coords="147,283 149,285 150,282 152,276 152,273 152,269 154,264 157,259 165,257 161,258 165,254 162,253 158,254 156,252 150,249 146,251 142,253 139,254 134,254 129,254 127,258 128,261 130,257 139,258 142,263 142,266 142,269 144,273 144,276 144,277 144,278 " shape="polygon">
                    <area alt="زن" title="کلیه" coords="169,223 167,218 167,216 166,215 161,217 159,218 159,220 159,222 163,225 " shape="polygon">
                    <area alt="زن" title="کلیه" coords="134,225 136,222 135,220 134,218 132,217 130,218 127,218 125,223 128,225 " shape="polygon">
                    <area alt="زن" title="کیسه صفرا" coords="133,211,4" shape="circle">
                </map>
            </div>
            <div class="buttons">
                <button style="margin-left: 10px;" class="adv-Search-btn">جست و جو</button>
                <a href='Home.html'>لغو</a>
            </div>
        </div>
        <div class="show-errors">
        </div>
    </div>
</div>

<div class="show-cases container row" style="padding: 0;">
</div>
@stop
