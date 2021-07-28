<template>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-4 text-left">
                    <a data-toggle="collapse" href="#collapseConfiguration">Configuration</a>
                    <h3 class="card-title">{{this.title}}</h3>
                </div>
                <div class="col-sm-8">
                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                    <label class="btn btn-sm btn-primary btn-simple active" id="0" v-on:click="onRealTimeClock">
                        <input type="radio" name="options" checked>
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Real Time Clock</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-single-02"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple active" id="2" v-on:click="onSystemLanguage">
                        <input type="radio" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">System Language</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-single-02"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple" id="5" v-on:click="onTimezone">
                        <input type="radio" class="d-none d-sm-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Timezone</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-gift-2"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple" id="6" v-on:click="onLocation">
                        <input type="radio" class="d-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Location</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-tap-02"></i>
                        </span>
                    </label>
                    </div>
                </div>
            </div>
        </div>
        <div id="collapseConfiguration" class="card-body">
            <div class="form-group" id="realtime-clock-body" v-if="this.showRealTimeClock">
                <div class="row">
                    <div class="col-sm-4">
                        <label> Date : </label>
                        <input class="form-control" type="date" id="rtcDate" name="rtcDate" min="0000-00-00" max="2099-12-31" v-model="rtcDateValue" required>
                    </div>
                    <div class="col-sm-4">
                        <label> Time : </label>
                        <input class="form-control" type="time" id="rtcTime" name="rtcTime" min="00:00:00" max="23:59:59" v-model="rtcTimeValue" required>
                    </div>
                </div>
                <button class="btn btn-primary" id="btnRealTimeClock" v-on:click="setRealTimeClock">Set Real Time Clock</button>
            </div>
            <div class="form-group" id="system-language-body" v-if="this.showSystemLanguage">
                <div class="row">
                    <div class="col-sm-6">
                        <label>System Language</label>
                        <select class="form-control" id="systemLanguage" v-model="systemLanguageValue">
                            <option value="aa">aa (Afar)</option>
                            <option value="ab">ab (Abkhazian)</option>
                            <option value="af">af (Afrikaans)</option>
                            <option value="ak">ak (Akan)</option>
                            <option value="sq">sq (Albanian)</option>
                            <option value="am">am (Amharic)</option>
                            <option value="ar">ar (Arabic)</option>
                            <option value="an">an (Aragonese)</option>
                            <option value="hy">hy (Armenian)</option>
                            <option value="as">as (Assamese)</option>
                            <option value="av">av (Avaric)</option>
                            <option value="ae">ae (Avestan)</option>
                            <option value="ay">ay (Aymara)</option>
                            <option value="az">az (Azerbaijani)</option>
                            <option value="ba">ba (Bashkir)</option>
                            <option value="bm">bm (Bambara)</option>
                            <option value="eu">eu (Basque)</option>
                            <option value="be">be (Belarusian)</option>
                            <option value="bn">bn (Bengali)</option>
                            <option value="bh">bh (Bihari languages)</option>
                            <option value="bi">bi (Bislama)</option>
                            <option value="bo">bo (Tibetan)</option>
                            <option value="bs">bs (Bosnian)</option>
                            <option value="br">br (Breton)</option>
                            <option value="bg">bg (Bulgarian)</option>
                            <option value="my">my (Burmese)</option>
                            <option value="ca">ca (Catalan)</option>
                            <option value="cs">cs (Czech)</option>
                            <option value="ch">ch (Chamorro)</option>
                            <option value="ce">ce (Chechen)</option>
                            <option value="zh">zh (Chinese)</option>
                            <option value="cu">cu (Church Slavic)</option>
                            <option value="cv">cv (Chuvash)</option>
                            <option value="kw">kw (Cornish)</option>
                            <option value="co">co (Corsican)</option>
                            <option value="cr">cr (Cree)</option>
                            <option value="cy">cy (Welsh)</option>
                            <option value="cs">cs (Czesh)</option>
                            <option value="da">da (Danish)</option>
                            <option value="de">de (German)</option>
                            <option value="dv">dv (Divehi)</option>
                            <option value="nl">nl (Dutch)</option>
                            <option value="dz">dz (Dzongkha)</option>
                            <option value="el">el (Greek)</option>
                            <option value="en">en (English)</option>
                            <option value="eo">eo (Esperanto)</option>
                            <option value="et">et (Estonian)</option>
                            <option value="eu">eu (Basque)</option>
                            <option value="ee">ee (Ewe)</option>
                            <option value="f0">fo (Faroese)</option>
                            <option value="fa">fa (Persian)</option>
                            <option value="fj">fj (Fijian)</option>
                            <option value="fi">fi (Finnish)</option>
                            <option value="fr">fr (French)</option>
                            <option value="fy">fy (Western Frisian)</option>
                            <option value="ff">ff (Fulah)</option>
                            <option value="ka">ka (Georgian)</option>
                            <option value="de">de (German)</option>
                            <option value="gd">gd (Gaelic)</option>
                            <option value="ga">ga (Irish)</option>
                            <option value="gl">gl (Galician)</option>
                            <option value="gv">gv (Manx)</option>
                            <option value="el">el (Greek)</option>
                            <option value="gn">gn (Guarani)</option>
                            <option value="gu">gu (Gujarati)</option>
                            <option value="ht">ht (Haitian)</option>
                            <option value="ha">ha (Hausa)</option>
                            <option value="he">he (Hebrew)</option>
                            <option value="hz">hz (Herero)</option>
                            <option value="hi">hi (Hindi)</option>
                            <option value="ho">ho (Hiri Motu)</option>
                            <option value="hr">hr (Croatian)</option>
                            <option value="hu">hu (Hungarian)</option>
                            <option value="hy">hy (Armenian)</option>
                            <option value="ig">ig (Lgbo)</option>
                            <option value="is">is (Icelandic)</option>
                            <option value="io">io (Ido)</option>
                            <option value="ii">ii (Sichuan Yi)</option>
                            <option value="iu">iu (Inuktitut)</option>
                            <option value="ie">ie (Interlingue)</option>
                            <option value="ia">ia (Interlingua)</option>
                            <option value="id">id (Indonesian)</option>
                            <option value="ik">ik (Inupiaq)</option>
                            <option value="is">is (Icelandic)</option>
                            <option value="it">it (Italian)</option>
                            <option value="jv">jv (Javanese)</option>
                            <option value="ja">ja (Japanese)</option>
                            <option value="kl">kl (Kalaallisut)</option>
                            <option value="kn">kn (Kannada)</option>
                            <option value="ks">ks (Kashmiri)</option>
                            <option value="ka">ka (Georgian)</option>
                            <option value="kr">kr (Kanuri)</option>
                            <option value="kk">kk (Kazakh)</option>
                            <option value="km">km (Central Khmer)</option>
                            <option value="ki">ki (Kikuyu)</option>
                            <option value="rw">rw (Kinyarwanda)</option>
                            <option value="ky">ky (Kirghiz)</option>
                            <option value="kv">kv (Komi)</option>
                            <option value="kg">kg (Kongo)</option>
                            <option value="ko">ko (Korean)</option>
                            <option value="kj">kj (Kuanyama)</option>
                            <option value="ku">ku (Kurdish)</option>
                            <option value="lo">lo (Lao)</option>
                            <option value="la">la (Latin)</option>
                            <option value="lv">lv (Latvian)</option>
                            <option value="li">li (Limburgan)</option>
                            <option value="ln">ln (Lingala)</option>
                            <option value="lt">lt (Lithuanian)</option>
                            <option value="lb">lb (Luxembourgish)</option>
                            <option value="lu">lu (Luba-Katanga)</option>
                            <option value="lg">lg (Ganda)</option>
                            <option value="mk">mk (Macedonian)</option>
                            <option value="mh">mh (Marshallese)</option>
                            <option value="ml">ml (Malayalam)</option>
                            <option value="mi">mi (Maori)</option>
                            <option value="mr">mr (Marathi)</option>
                            <option value="ms">ms (Malay)</option>
                            <option value="mk">mk (Macedonian)</option>
                            <option value="mg">mg (Malagasy)</option>
                            <option value="mt">mt (Maltese)</option>
                            <option value="mn">mn (Mongolian)</option>
                            <option value="mi">mi (Maori)</option>
                            <option value="ms">ms (Malay)</option>
                            <option value="my">my (Burmese)</option>
                            <option value="na">na (Nauru)</option>
                            <option value="nv">nv (Navajo)</option>
                            <option value="nr">nr (Ndebele)</option>
                            <option value="nd">nd (Ndebele)</option>
                            <option value="ng">ng (Ndonga)</option>
                            <option value="ne">ne (Nepali)</option>
                            <option value="nl">nl (Dutch)</option>
                            <option value="nn">nn (Norwegian Nynorsk)</option>
                            <option value="nb">nb (Bokmal)</option>
                            <option value="no">no (Norwegian)</option>
                            <option value="ny">ny (Chichewa)</option>
                            <option value="oc">oc (Occitan)</option>
                            <option value="oj">oj (Ojibwa)</option>
                            <option value="or">or (Oriya)</option>
                            <option value="om">om (Oromo)</option>
                            <option value="os">os (Ossetian)</option>
                            <option value="pa">pa (Panjabi)</option>
                            <option value="fa">fa (Persian)</option>
                            <option value="pi">pi (Pali)</option>
                            <option value="pl">pl (Polish)</option>
                            <option value="pt">pt (Portuguese)</option>
                            <option value="ps">ps (Pushto)</option>
                            <option value="qu">qu (Quechua)</option>
                            <option value="rm">rm (Romansh)</option>
                            <option value="ro">ro (Romanian)</option>
                            <option value="rn">rn (Rundi)</option>
                            <option value="ru">ru (Russian)</option>
                            <option value="sg">sg (Sango)</option>
                            <option value="sa">sa (Sanskrit)</option>
                            <option value="si">si (Sinhala)</option>
                            <option value="sk">sk (Slovak)</option>
                            <option value="sl">sl (Slovenian)</option>
                            <option value="se">se (Northern Sami)</option>
                            <option value="sm">sm (Samoan)</option>
                            <option value="sn">sn (Shona)</option>
                            <option value="sd">sd (Sindhi)</option>
                            <option value="so">so (Somali)</option>
                            <option value="st">st (Sotho)</option>
                            <option value="es">es (Spanish)</option>
                            <option value="sq">sq (Albanian)</option>
                            <option value="sc">sc (Sardinian)</option>
                            <option value="sr">sr (Serbian)</option>
                            <option value="ss">ss (Swati)</option>
                            <option value="su">su (Sundanese)</option>
                            <option value="sw">sw (Swahili)</option>
                            <option value="sv">sv (Swedish)</option>
                            <option value="ty">ty (Tahitian)</option>
                            <option value="ta">ta (Tamil)</option>
                            <option value="tt">tt (Tatar)</option>
                            <option value="te">te (Telugu)</option>
                            <option value="tg">tg (Tajik)</option>
                            <option value="tl">tl (Tagalog)</option>
                            <option value="th">th (Thai)</option>
                            <option value="bo">bo (Tibetan)</option>
                            <option value="ti">ti (Tigrinya)</option>
                            <option value="to">to (Tonga)</option>
                            <option value="tn">tn (Tswana)</option>
                            <option value="ts">ts (Tsonga)</option>
                            <option value="tk">tk (Turkmen)</option>
                            <option value="tr">tr (Turkish)</option>
                            <option value="tw">tw (Twi)</option>
                            <option value="ug">ug (Uighur)</option>
                            <option value="uk">uk (Ukrainian)</option>
                            <option value="ur">ur (Urdu)</option>
                            <option value="uz">uz (Uzbek)</option>
                            <option value="ve">ve (Venda)</option>
                            <option value="vi">vi (Vietnamese)</option>
                            <option value="vo">vo (Volapuk)</option>
                            <option value="cy">cy (Welsh)</option>
                            <option value="wa">wa (Walloon)</option>
                            <option value="wo">wo (Wolof)</option>
                            <option value="xh">xh (Xhosa)</option>
                            <option value="yi">yi (Yiddish)</option>
                            <option value="yo">yo (Yoruba)</option>
                            <option value="za">za (Zhuang)</option>
                            <option value="zh">zh (Chinese)</option>
                            <option value="zu">zu (Zulu)</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" id="btnSystemLanguage" v-on:click="setSystemLanguage">Set System Language</button>
            </div>
            <div class="form-group" id="timezone-body" v-if="this.showTimezone">
                <div class="row">
                    <div class="col-sm-6">
                        <label>Timezone</label>
                        <select class="form-control" id="utcTimeZone" v-model="timeZoneValue">
                            <option value="-660">UTC - 11:00</option>
                            <option value="-600">UTC - 10:00</option>
                            <option value="-540">UTC - 09:00</option>
                            <option value="-480">UTC - 08:00</option>
                            <option value="-420">UTC - 07:00</option>
                            <option value="-360">UTC - 06:00</option>
                            <option value="-300">UTC - 05:00</option>
                            <option value="-240">UTC - 04:00</option>
                            <option value="-180">UTC - 03:00</option>
                            <option value="-120">UTC - 02:00</option>
                            <option value="-60">UTC - 01:00</option>
                            <option value="0" selected>UTC</option>
                            <option value="60">UTC + 01:00</option>
                            <option value="120">UTC + 02:00</option>
                            <option value="180">UTC + 03:00</option>
                            <option value="240">UTC + 04:00</option>
                            <option value="300">UTC + 05:00</option>
                            <option value="360">UTC + 06:00</option>
                            <option value="420">UTC + 07:00</option>
                            <option value="480">UTC + 08:00</option>
                            <option value="540">UTC + 09:00</option>
                            <option value="600">UTC + 10:00</option>
                            <option value="660">UTC + 11:00</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" id="btnTimezone" v-on:click="setTimezone">Set Timezone</button>
            </div>
            <div class="form-group" id="overlays-body" v-if="this.showLocation">
                <div class="row">
                    <div class="col-sm-6">
                        <label>Location</label>
                    </div>
                </div>
                <button class="btn btn-primary" id="btnLocation" v-on:click="setLocation">Set Location</button>
            </div>
            
        </div>
    </div>
</template>

<script>
import CustomSlider from "vue-custom-range-slider";
import "vue-custom-range-slider/dist/vue-custom-range-slider.css";

export default {
    components: {
        CustomSlider
    },
    data() {
        return {
            title: 'Set Real Time clock',
            showRealTimeClock: true,
            showSystemLanguage: false,
            showTimezone: false,
            showLocation: false,
            rtcDateValue: this.getToday(),
            rtcTimeValue: this.getTime(),
            systemLanguageValue: "en",
            timeZoneValue: "0",
        }
    },
    mounted() {
        console.log('OutputParameter-Component mounted.')
    },
    methods: {
        onRealTimeClock: function(event) {
            this.title = "Set Real Time Clock";
            this.showRealTimeClock = true;
            this.showSystemLanguage = this.showTimezone = this.showLocation = false;
        },
        onSystemLanguage: function(event) {
            this.title = "Set System Language";
            this.showSystemLanguage = true;
            this.showRealTimeClock= this.showTimezone = this.showLocation = false;
        },
        onTimezone: function(event) {
            this.title = "Set Timezone";
            this.showTimezone = true;
            this.showRealTimeClock = this.showSystemLanguage = this.showLocation = false;
        },
        onLocation: function(event) {
            this.title = "Set Location";
            this.showLocation = true;
            this.showRealTimeClock = this.showSystemLanguage = this.showTimezone = false;
        },
        sendConfigurationCommand: function(command) {
            if (selectedCameraId == "")
                socket.emit('admin', null, JSON.stringify(command));
            else
                socket.emit('admin', selectedCameraId, JSON.stringify(command));
        },
        setRealTimeClock: function(event) {
            debugger;
            var command = {
                type : 'real-time-clock',
                rtcDateValue: this.rtcDateValue,
                rtcTimeValue: this.rtcTimeValue,
            };
            
            this.sendConfigurationCommand(command);
            alert('Sent Real Time Clock is called');
        },
        setSystemLanguage: function(event) {
            debugger;
            var command = {
                type : 'system-language',
                systemLanguageValue: this.systemLanguageValue,
            };
            
            this.sendConfigurationCommand(command);
            alert('Sent System Language is called');
        },
        setTimezone: function(event) {
            debugger;
            var command = {
                type : 'set-timezone',
                timeZoneValue: this.timeZoneValue,
            };
            
            this.sendConfigurationCommand(command);
            alert('Sent TimeZone is called');
        },
        setLocation: function(event) {
            debugger;
            var command = {
                type : 'set-location',
            };
            
            this.sendConfigurationCommand(command);
            alert('Sent Location is called');
        },
        getToday: function() {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();

            var dateString = "" + dd + '/' + mm + '/' + yyyy + "";
            return dateString;
        },
        getTime: function() {
            var today = new Date();
            var timeString = "" + today.getHours() + ":"  + today.getMinutes() + ":" + today.getSeconds() + "";
            return timeString;
        },
    }
}
</script>
<style scoped>
.slider {
    margin-top: 10px !important;
    margin-bottom: 0px !important;
}
</style>