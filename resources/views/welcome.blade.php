<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>The Real World | Join 155K+ Members Learning To Build Real Income</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <style>
            summary::-webkit-details-marker { display: none; }
            summary::marker { display: none; }
        </style>

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */@layer theme{:root,:host{--font-sans:'Instrument Sans',ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--font-serif:ui-serif,Georgia,Cambria,"Times New Roman",Times,serif;--font-mono:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;--color-red-50:oklch(.971 .013 17.38);--color-red-100:oklch(.936 .032 17.717);--color-red-200:oklch(.885 .062 18.334);--color-red-300:oklch(.808 .114 19.571);--color-red-400:oklch(.704 .191 22.216);--color-red-500:oklch(.637 .237 25.331);--color-red-600:oklch(.577 .245 27.325);--color-red-700:oklch(.505 .213 27.518);--color-red-800:oklch(.444 .177 26.899);--color-red-900:oklch(.396 .141 25.723);--color-red-950:oklch(.258 .092 26.042);--color-orange-50:oklch(.98 .016 73.684);--color-orange-100:oklch(.954 .038 75.164);--color-orange-200:oklch(.901 .076 70.697);--color-orange-300:oklch(.837 .128 66.29);--color-orange-400:oklch(.75 .183 55.934);--color-orange-500:oklch(.705 .213 47.604);--color-orange-600:oklch(.646 .222 41.116);--color-orange-700:oklch(.553 .195 38.402);--color-orange-800:oklch(.47 .157 37.304);--color-orange-900:oklch(.408 .123 38.172);--color-orange-950:oklch(.266 .079 36.259);--color-amber-50:oklch(.987 .022 95.277);--color-amber-100:oklch(.962 .059 95.617);--color-amber-200:oklch(.924 .12 95.746);--color-amber-300:oklch(.879 .169 91.605);--color-amber-400:oklch(.828 .189 84.429);--color-amber-500:oklch(.769 .188 70.08);--color-amber-600:oklch(.666 .179 58.318);--color-amber-700:oklch(.555 .163 48.998);--color-amber-800:oklch(.473 .137 46.201);--color-amber-900:oklch(.414 .112 45.904);--color-amber-950:oklch(.279 .077 45.635);--color-yellow-50:oklch(.987 .026 102.212);--color-yellow-100:oklch(.973 .071 103.193);--color-yellow-200:oklch(.945 .129 101.54);--color-yellow-300:oklch(.905 .182 98.111);--color-yellow-400:oklch(.852 .199 91.936);--color-yellow-500:oklch(.795 .184 86.047);--color-yellow-600:oklch(.681 .162 75.834);--color-yellow-700:oklch(.554 .135 66.442);--color-yellow-800:oklch(.476 .114 61.907);--color-yellow-900:oklch(.421 .095 57.708);--color-yellow-950:oklch(.286 .066 53.813);--color-lime-50:oklch(.986 .031 120.757);--color-lime-100:oklch(.967 .067 122.328);--color-lime-200:oklch(.938 .127 124.321);--color-lime-300:oklch(.897 .196 126.665);--color-lime-400:oklch(.841 .238 128.85);--color-lime-500:oklch(.768 .233 130.85);--color-lime-600:oklch(.648 .2 131.684);--color-lime-700:oklch(.532 .157 131.589);--color-lime-800:oklch(.453 .124 130.933);--color-lime-900:oklch(.405 .101 131.063);--color-lime-950:oklch(.274 .072 132.109);--color-green-50:oklch(.982 .018 155.826);--color-green-100:oklch(.962 .044 156.743);--color-green-200:oklch(.925 .084 155.995);--color-green-300:oklch(.871 .15 154.449);--color-green-400:oklch(.792 .209 151.711);--color-green-500:oklch(.723 .219 149.579);--color-green-600:oklch(.627 .194 149.214);--color-green-700:oklch(.527 .154 150.069);--color-green-800:oklch(.448 .119 151.328);--color-green-900:oklch(.393 .095 152.535);--color-green-950:oklch(.266 .065 152.934);--color-emerald-50:oklch(.979 .021 166.113);--color-emerald-100:oklch(.95 .052 163.051);--color-emerald-200:oklch(.905 .093 164.15);--color-emerald-300:oklch(.845 .143 164.978);--color-emerald-400:oklch(.765 .177 163.223);--color-emerald-500:oklch(.696 .17 162.48);--color-emerald-600:oklch(.596 .145 163.225);--color-emerald-700:oklch(.508 .118 165.612);--color-emerald-800:oklch(.432 .095 166.913);--color-emerald-900:oklch(.378 .077 168.94);--color-emerald-950:oklch(.262 .051 172.552);--color-teal-50:oklch(.984 .014 180.72);--color-teal-100:oklch(.953 .051 180.801);--color-teal-200:oklch(.91 .096 180.426);--color-teal-300:oklch(.855 .138 181.071);--color-teal-400:oklch(.777 .152 181.912);--color-teal-500:oklch(.704 .14 182.503);--color-teal-600:oklch(.6 .118 184.704);--color-teal-700:oklch(.511 .096 186.391);--color-teal-800:oklch(.437 .078 188.216);--color-teal-900:oklch(.386 .063 188.416);--color-teal-950:oklch(.277 .046 192.524);--color-cyan-50:oklch(.984 .019 200.873);--color-cyan-100:oklch(.956 .045 203.388);--color-cyan-200:oklch(.917 .08 205.041);--color-cyan-300:oklch(.865 .127 207.078);--color-cyan-400:oklch(.789 .154 211.53);--color-cyan-500:oklch(.715 .143 215.221);--color-cyan-600:oklch(.609 .126 221.723);--color-cyan-700:oklch(.52 .105 223.128);--color-cyan-800:oklch(.45 .085 224.283);--color-cyan-900:oklch(.398 .07 227.392);--color-cyan-950:oklch(.302 .056 229.695);--color-sky-50:oklch(.977 .013 236.62);--color-sky-100:oklch(.951 .026 236.824);--color-sky-200:oklch(.901 .058 230.902);--color-sky-300:oklch(.828 .111 230.318);--color-sky-400:oklch(.746 .16 232.661);--color-sky-500:oklch(.685 .169 237.323);--color-sky-600:oklch(.588 .158 241.966);--color-sky-700:oklch(.5 .134 242.749);--color-sky-800:oklch(.443 .11 240.79);--color-sky-900:oklch(.391 .09 240.876);--color-sky-950:oklch(.293 .066 243.157);--color-blue-50:oklch(.97 .014 254.604);--color-blue-100:oklch(.932 .032 255.585);--color-blue-200:oklch(.882 .059 254.128);--color-blue-300:oklch(.809 .105 251.813);--color-blue-400:oklch(.707 .165 254.624);--color-blue-500:oklch(.623 .214 259.815);--color-blue-600:oklch(.546 .245 262.881);--color-blue-700:oklch(.488 .243 264.376);--color-blue-800:oklch(.424 .199 265.638);--color-blue-900:oklch(.379 .146 265.522);--color-blue-950:oklch(.282 .091 267.935);--color-indigo-50:oklch(.962 .018 272.314);--color-indigo-100:oklch(.93 .034 272.788);--color-indigo-200:oklch(.87 .065 274.039);--color-indigo-300:oklch(.785 .115 274.713);--color-indigo-400:oklch(.673 .182 276.935);--color-indigo-500:oklch(.585 .233 277.117);--color-indigo-600:oklch(.511 .262 276.966);--color-indigo-700:oklch(.457 .24 277.023);--color-indigo-800:oklch(.398 .195 277.366);--color-indigo-900:oklch(.359 .144 278.697);--color-indigo-950:oklch(.257 .09 281.288);--color-violet-50:oklch(.969 .016 293.756);--color-violet-100:oklch(.943 .029 294.588);--color-violet-200:oklch(.894 .057 293.283);--color-violet-300:oklch(.811 .111 293.571);--color-violet-400:oklch(.702 .183 293.541);--color-violet-500:oklch(.606 .25 292.717);--color-violet-600:oklch(.541 .281 293.009);--color-violet-700:oklch(.491 .27 292.581);--color-violet-800:oklch(.432 .232 292.759);--color-violet-900:oklch(.38 .189 293.745);--color-violet-950:oklch(.283 .141 291.089);--color-purple-50:oklch(.977 .014 308.299);--color-purple-100:oklch(.946 .033 307.174);--color-purple-200:oklch(.902 .063 306.703);--color-purple-300:oklch(.827 .119 306.383);--color-purple-400:oklch(.714 .203 305.504);--color-purple-500:oklch(.627 .265 303.9);--color-purple-600:oklch(.558 .288 302.321);--color-purple-700:oklch(.496 .265 301.924);--color-purple-800:oklch(.438 .218 303.724);--color-purple-900:oklch(.381 .176 304.987);--color-purple-950:oklch(.291 .149 302.717);--color-fuchsia-50:oklch(.977 .017 320.058);--color-fuchsia-100:oklch(.952 .037 318.852);--color-fuchsia-200:oklch(.903 .076 319.62);--color-fuchsia-300:oklch(.833 .145 321.434);--color-fuchsia-400:oklch(.74 .238 322.16);--color-fuchsia-500:oklch(.667 .295 322.15);--color-fuchsia-600:oklch(.591 .293 322.896);--color-fuchsia-700:oklch(.518 .253 323.949);--color-fuchsia-800:oklch(.452 .211 324.591);--color-fuchsia-900:oklch(.401 .17 325.612);--color-fuchsia-950:oklch(.293 .136 325.661);--color-pink-50:oklch(.971 .014 343.198);--color-pink-100:oklch(.948 .028 342.258);--color-pink-200:oklch(.899 .061 343.231);--color-pink-300:oklch(.823 .12 346.018);--color-pink-400:oklch(.718 .202 349.761);--color-pink-500:oklch(.656 .241 354.308);--color-pink-600:oklch(.592 .249 .584);--color-pink-700:oklch(.525 .223 3.958);--color-pink-800:oklch(.459 .187 3.815);--color-pink-900:oklch(.408 .153 2.432);--color-pink-950:oklch(.284 .109 3.907);--color-rose-50:oklch(.969 .015 12.422);--color-rose-100:oklch(.941 .03 12.58);--color-rose-200:oklch(.892 .058 10.001);--color-rose-300:oklch(.81 .117 11.638);--color-rose-400:oklch(.712 .194 13.428);--color-rose-500:oklch(.645 .246 16.439);--color-rose-600:oklch(.586 .253 17.585);--color-rose-700:oklch(.514 .222 16.935);--color-rose-800:oklch(.455 .188 13.697);--color-rose-900:oklch(.41 .159 10.272);--color-rose-950:oklch(.271 .105 12.094);--color-slate-50:oklch(.984 .003 247.858);--color-slate-100:oklch(.968 .007 247.896);--color-slate-200:oklch(.929 .013 255.508);--color-slate-300:oklch(.869 .022 252.894);--color-slate-400:oklch(.704 .04 256.788);--color-slate-500:oklch(.554 .046 257.417);--color-slate-600:oklch(.446 .043 257.281);--color-slate-700:oklch(.372 .044 257.287);--color-slate-800:oklch(.279 .041 260.031);--color-slate-900:oklch(.208 .042 265.755);--color-slate-950:oklch(.129 .042 264.695);--color-gray-50:oklch(.985 .002 247.839);--color-gray-100:oklch(.967 .003 264.542);--color-gray-200:oklch(.928 .006 264.531);--color-gray-300:oklch(.872 .01 258.338);--color-gray-400:oklch(.707 .022 261.325);--color-gray-500:oklch(.551 .027 264.364);--color-gray-600:oklch(.446 .03 256.802);--color-gray-700:oklch(.373 .034 259.733);--color-gray-800:oklch(.278 .033 256.848);--color-gray-900:oklch(.21 .034 264.665);--color-gray-950:oklch(.13 .028 261.692);--color-zinc-50:oklch(.985 0 0);--color-zinc-100:oklch(.967 .001 286.375);--color-zinc-200:oklch(.92 .004 286.32);--color-zinc-300:oklch(.871 .006 286.286);--color-zinc-400:oklch(.705 .015 286.067);--color-zinc-500:oklch(.552 .016 285.938);--color-zinc-600:oklch(.442 .017 285.786);--color-zinc-700:oklch(.37 .013 285.805);--color-zinc-800:oklch(.274 .006 286.033);--color-zinc-900:oklch(.21 .006 285.885);--color-zinc-950:oklch(.141 .005 285.823);--color-neutral-50:oklch(.985 0 0);--color-neutral-100:oklch(.97 0 0);--color-neutral-200:oklch(.922 0 0);--color-neutral-300:oklch(.87 0 0);--color-neutral-400:oklch(.708 0 0);--color-neutral-500:oklch(.556 0 0);--color-neutral-600:oklch(.439 0 0);--color-neutral-700:oklch(.371 0 0);--color-neutral-800:oklch(.269 0 0);--color-neutral-900:oklch(.205 0 0);--color-neutral-950:oklch(.145 0 0);--color-stone-50:oklch(.985 .001 106.423);--color-stone-100:oklch(.97 .001 106.424);--color-stone-200:oklch(.923 .003 48.717);--color-stone-300:oklch(.869 .005 56.366);--color-stone-400:oklch(.709 .01 56.259);--color-stone-500:oklch(.553 .013 58.071);--color-stone-600:oklch(.444 .011 73.639);--color-stone-700:oklch(.374 .01 67.558);--color-stone-800:oklch(.268 .007 34.298);--color-stone-900:oklch(.216 .006 56.043);--color-stone-950:oklch(.147 .004 49.25);--color-black:#000;--color-white:#fff;--spacing:.25rem;--breakpoint-sm:40rem;--breakpoint-md:48rem;--breakpoint-lg:64rem;--breakpoint-xl:80rem;--breakpoint-2xl:96rem;--container-3xs:16rem;--container-2xs:18rem;--container-xs:20rem;--container-sm:24rem;--container-md:28rem;--container-lg:32rem;--container-xl:36rem;--container-2xl:42rem;--container-3xl:48rem;--container-4xl:56rem;--container-5xl:64rem;--container-6xl:72rem;--container-7xl:80rem;--text-xs:.75rem;--text-xs--line-height:calc(1/.75);--text-sm:.875rem;--text-sm--line-height:calc(1.25/.875);--text-base:1rem;--text-base--line-height: 1.5 ;--text-lg:1.125rem;--text-lg--line-height:calc(1.75/1.125);--text-xl:1.25rem;--text-xl--line-height:calc(1.75/1.25);--text-2xl:1.5rem;--text-2xl--line-height:calc(2/1.5);--text-3xl:1.875rem;--text-3xl--line-height: 1.2 ;--text-4xl:2.25rem;--text-4xl--line-height:calc(2.5/2.25);--text-5xl:3rem;--text-5xl--line-height:1;--text-6xl:3.75rem;--text-6xl--line-height:1;--text-7xl:4.5rem;--text-7xl--line-height:1;--text-8xl:6rem;--text-8xl--line-height:1;--text-9xl:8rem;--text-9xl--line-height:1;--font-weight-thin:100;--font-weight-extralight:200;--font-weight-light:300;--font-weight-normal:400;--font-weight-medium:500;--font-weight-semibold:600;--font-weight-bold:700;--font-weight-extrabold:800;--font-weight-black:900;--tracking-tighter:-.05em;--tracking-tight:-.025em;--tracking-normal:0em;--tracking-wide:.025em;--tracking-wider:.05em;--tracking-widest:.1em;--leading-tight:1.25;--leading-snug:1.375;--leading-normal:1.5;--leading-relaxed:1.625;--leading-loose:2;--radius-xs:.125rem;--radius-sm:.25rem;--radius-md:.375rem;--radius-lg:.5rem;--radius-xl:.75rem;--radius-2xl:1rem;--radius-3xl:1.5rem;--radius-4xl:2rem;--shadow-2xs:0 1px #0000000d;--shadow-xs:0 1px 2px 0 #0000000d;--shadow-sm:0 1px 3px 0 #0000001a,0 1px 2px -1px #0000001a;--shadow-md:0 4px 6px -1px #0000001a,0 2px 4px -2px #0000001a;--shadow-lg:0 10px 15px -3px #0000001a,0 4px 6px -4px #0000001a;--shadow-xl:0 20px 25px -5px #0000001a,0 8px 10px -6px #0000001a;--shadow-2xl:0 25px 50px -12px #00000040;--inset-shadow-2xs:inset 0 1px #0000000d;--inset-shadow-xs:inset 0 1px 1px #0000000d;--inset-shadow-sm:inset 0 2px 4px #0000000d;--drop-shadow-xs:0 1px 1px #0000000d;--drop-shadow-sm:0 1px 2px #00000026;--drop-shadow-md:0 3px 3px #0000001f;--drop-shadow-lg:0 4px 4px #00000026;--drop-shadow-xl:0 9px 7px #0000001a;--drop-shadow-2xl:0 25px 25px #00000026;--ease-in:cubic-bezier(.4,0,1,1);--ease-out:cubic-bezier(0,0,.2,1);--ease-in-out:cubic-bezier(.4,0,.2,1);--animate-spin:spin 1s linear infinite;--animate-ping:ping 1s cubic-bezier(0,0,.2,1)infinite;--animate-pulse:pulse 2s cubic-bezier(.4,0,.6,1)infinite;--animate-bounce:bounce 1s infinite;--blur-xs:4px;--blur-sm:8px;--blur-md:12px;--blur-lg:16px;--blur-xl:24px;--blur-2xl:40px;--blur-3xl:64px;--perspective-dramatic:100px;--perspective-near:300px;--perspective-normal:500px;--perspective-midrange:800px;--perspective-distant:1200px;--aspect-video:16/9;--default-transition-duration:.15s;--default-transition-timing-function:cubic-bezier(.4,0,.2,1);--default-font-family:var(--font-sans);--default-font-feature-settings:var(--font-sans--font-feature-settings);--default-font-variation-settings:var(--font-sans--font-variation-settings);--default-mono-font-family:var(--font-mono);--default-mono-font-feature-settings:var(--font-mono--font-feature-settings);--default-mono-font-variation-settings:var(--font-mono--font-variation-settings)}}@layer base{*,:after,:before,::backdrop{box-sizing:border-box;border:0 solid;margin:0;padding:0}::file-selector-button{box-sizing:border-box;border:0 solid;margin:0;padding:0}html,:host{-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;line-height:1.5;font-family:var(--default-font-family,ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji");font-feature-settings:var(--default-font-feature-settings,normal);font-variation-settings:var(--default-font-variation-settings,normal);-webkit-tap-highlight-color:transparent}body{line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;-webkit-text-decoration:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,samp,pre{font-family:var(--default-mono-font-family,ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace);font-feature-settings:var(--default-mono-font-feature-settings,normal);font-variation-settings:var(--default-mono-font-variation-settings,normal);font-size:1em}small{font-size:80%}sub,sup{vertical-align:baseline;font-size:75%;line-height:0;position:relative}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}:-moz-focusring{outline:auto}progress{vertical-align:baseline}summary{display:list-item}ol,ul,menu{list-style:none}img,svg,video,canvas,audio,iframe,embed,object{vertical-align:middle;display:block}img,video{max-width:100%;height:auto}button,input,select,optgroup,textarea{font:inherit;font-feature-settings:inherit;font-variation-settings:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}::file-selector-button{font:inherit;font-feature-settings:inherit;font-variation-settings:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}:where(select:is([multiple],[size])) optgroup{font-weight:bolder}:where(select:is([multiple],[size])) optgroup option{padding-inline-start:20px}::file-selector-button{margin-inline-end:4px}::placeholder{opacity:1;color:color-mix(in oklab,currentColor 50%,transparent)}textarea{resize:vertical}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-date-and-time-value{min-height:1lh;text-align:inherit}::-webkit-datetime-edit{display:inline-flex}::-webkit-datetime-edit-fields-wrapper{padding:0}::-webkit-datetime-edit{padding-block:0}::-webkit-datetime-edit-year-field{padding-block:0}::-webkit-datetime-edit-month-field{padding-block:0}::-webkit-datetime-edit-day-field{padding-block:0}::-webkit-datetime-edit-hour-field{padding-block:0}::-webkit-datetime-edit-minute-field{padding-block:0}::-webkit-datetime-edit-second-field{padding-block:0}::-webkit-datetime-edit-millisecond-field{padding-block:0}::-webkit-datetime-edit-meridiem-field{padding-block:0}:-moz-ui-invalid{box-shadow:none}button,input:where([type=button],[type=reset],[type=submit]){-webkit-appearance:button;-moz-appearance:button;appearance:button}::file-selector-button{-webkit-appearance:button;-moz-appearance:button;appearance:button}::-webkit-inner-spin-button{height:auto}::-webkit-outer-spin-button{height:auto}[hidden]:where(:not([hidden=until-found])){display:none!important}}@layer components;@layer utilities{.absolute{position:absolute}.relative{position:relative}.static{position:static}.inset-0{inset:calc(var(--spacing)*0)}.-mt-\[4\.9rem\]{margin-top:-4.9rem}.-mb-px{margin-bottom:-1px}.mb-1{margin-bottom:calc(var(--spacing)*1)}.mb-2{margin-bottom:calc(var(--spacing)*2)}.mb-4{margin-bottom:calc(var(--spacing)*4)}.mb-6{margin-bottom:calc(var(--spacing)*6)}.-ml-8{margin-left:calc(var(--spacing)*-8)}.flex{display:flex}.hidden{display:none}.inline-block{display:inline-block}.inline-flex{display:inline-flex}.table{display:table}.aspect-\[335\/376\]{aspect-ratio:335/376}.h-1{height:calc(var(--spacing)*1)}.h-1\.5{height:calc(var(--spacing)*1.5)}.h-2{height:calc(var(--spacing)*2)}.h-2\.5{height:calc(var(--spacing)*2.5)}.h-3{height:calc(var(--spacing)*3)}.h-3\.5{height:calc(var(--spacing)*3.5)}.h-14{height:calc(var(--spacing)*14)}.h-14\.5{height:calc(var(--spacing)*14.5)}.min-h-screen{min-height:100vh}.w-1{width:calc(var(--spacing)*1)}.w-1\.5{width:calc(var(--spacing)*1.5)}.w-2{width:calc(var(--spacing)*2)}.w-2\.5{width:calc(var(--spacing)*2.5)}.w-3{width:calc(var(--spacing)*3)}.w-3\.5{width:calc(var(--spacing)*3.5)}.w-\[448px\]{width:448px}.w-full{width:100%}.max-w-\[335px\]{max-width:335px}.max-w-none{max-width:none}.flex-1{flex:1}.shrink-0{flex-shrink:0}.translate-y-0{--tw-translate-y:calc(var(--spacing)*0);translate:var(--tw-translate-x)var(--tw-translate-y)}.transform{transform:var(--tw-rotate-x)var(--tw-rotate-y)var(--tw-rotate-z)var(--tw-skew-x)var(--tw-skew-y)}.flex-col{flex-direction:column}.flex-col-reverse{flex-direction:column-reverse}.items-center{align-items:center}.justify-center{justify-content:center}.justify-end{justify-content:flex-end}.gap-3{gap:calc(var(--spacing)*3)}.gap-4{gap:calc(var(--spacing)*4)}:where(.space-x-1>:not(:last-child)){--tw-space-x-reverse:0;margin-inline-start:calc(calc(var(--spacing)*1)*var(--tw-space-x-reverse));margin-inline-end:calc(calc(var(--spacing)*1)*calc(1 - var(--tw-space-x-reverse)))}.overflow-hidden{overflow:hidden}.rounded-full{border-radius:3.40282e38px}.rounded-sm{border-radius:var(--radius-sm)}.rounded-t-lg{border-top-left-radius:var(--radius-lg);border-top-right-radius:var(--radius-lg)}.rounded-br-lg{border-bottom-right-radius:var(--radius-lg)}.rounded-bl-lg{border-bottom-left-radius:var(--radius-lg)}.border{border-style:var(--tw-border-style);border-width:1px}.border-\[\#19140035\]{border-color:#19140035}.border-\[\#e3e3e0\]{border-color:#e3e3e0}.border-black{border-color:var(--color-black)}.border-transparent{border-color:#0000}.bg-\[\#1b1b18\]{background-color:#1b1b18}.bg-\[\#FDFDFC\]{background-color:#fdfdfc}.bg-\[\#dbdbd7\]{background-color:#dbdbd7}.bg-\[\#fff2f2\]{background-color:#fff2f2}.bg-white{background-color:var(--color-white)}.p-6{padding:calc(var(--spacing)*6)}.px-5{padding-inline:calc(var(--spacing)*5)}.py-1{padding-block:calc(var(--spacing)*1)}.py-1\.5{padding-block:calc(var(--spacing)*1.5)}.py-2{padding-block:calc(var(--spacing)*2)}.pb-12{padding-bottom:calc(var(--spacing)*12)}.text-sm{font-size:var(--text-sm);line-height:var(--tw-leading,var(--text-sm--line-height))}.text-\[13px\]{font-size:13px}.leading-\[20px\]{--tw-leading:20px;line-height:20px}.leading-normal{--tw-leading:var(--leading-normal);line-height:var(--leading-normal)}.font-medium{--tw-font-weight:var(--font-weight-medium);font-weight:var(--font-weight-medium)}.text-\[\#1b1b18\]{color:#1b1b18}.text-\[\#706f6c\]{color:#706f6c}.text-\[\#F53003\],.text-\[\#f53003\]{color:#f53003}.text-white{color:var(--color-white)}.underline{text-decoration-line:underline}.underline-offset-4{text-underline-offset:4px}.opacity-100{opacity:1}.shadow-\[0px_0px_1px_0px_rgba\(0\,0\,0\,0\.03\)\,0px_1px_2px_0px_rgba\(0\,0\,0\,0\.06\)\]{--tw-shadow:0px 0px 1px 0px var(--tw-shadow-color,#00000008),0px 1px 2px 0px var(--tw-shadow-color,#0000000f);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.shadow-\[inset_0px_0px_0px_1px_rgba\(26\,26\,0\,0\.16\)\]{--tw-shadow:inset 0px 0px 0px 1px var(--tw-shadow-color,#1a1a0029);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.\!filter{filter:var(--tw-blur,)var(--tw-brightness,)var(--tw-contrast,)var(--tw-grayscale,)var(--tw-hue-rotate,)var(--tw-invert,)var(--tw-saturate,)var(--tw-sepia,)var(--tw-drop-shadow,)!important}.filter{filter:var(--tw-blur,)var(--tw-brightness,)var(--tw-contrast,)var(--tw-grayscale,)var(--tw-hue-rotate,)var(--tw-invert,)var(--tw-saturate,)var(--tw-sepia,)var(--tw-drop-shadow,)}.transition-all{transition-property:all;transition-timing-function:var(--tw-ease,var(--default-transition-timing-function));transition-duration:var(--tw-duration,var(--default-transition-duration))}.transition-opacity{transition-property:opacity;transition-timing-function:var(--tw-ease,var(--default-transition-timing-function));transition-duration:var(--tw-duration,var(--default-transition-duration))}.delay-300{transition-delay:.3s}.duration-750{--tw-duration:.75s;transition-duration:.75s}.not-has-\[nav\]\:hidden:not(:has(:is(nav))){display:none}.before\:absolute:before{content:var(--tw-content);position:absolute}.before\:top-0:before{content:var(--tw-content);top:calc(var(--spacing)*0)}.before\:top-1\/2:before{content:var(--tw-content);top:50%}.before\:bottom-0:before{content:var(--tw-content);bottom:calc(var(--spacing)*0)}.before\:bottom-1\/2:before{content:var(--tw-content);bottom:50%}.before\:left-\[0\.4rem\]:before{content:var(--tw-content);left:.4rem}.before\:border-l:before{content:var(--tw-content);border-left-style:var(--tw-border-style);border-left-width:1px}.before\:border-\[\#e3e3e0\]:before{content:var(--tw-content);border-color:#e3e3e0}@media (hover:hover){.hover\:border-\[\#1915014a\]:hover{border-color:#1915014a}.hover\:border-\[\#19140035\]:hover{border-color:#19140035}.hover\:border-black:hover{border-color:var(--color-black)}.hover\:bg-black:hover{background-color:var(--color-black)}}@media (width>=64rem){.lg\:-mt-\[6\.6rem\]{margin-top:-6.6rem}.lg\:mb-0{margin-bottom:calc(var(--spacing)*0)}.lg\:mb-6{margin-bottom:calc(var(--spacing)*6)}.lg\:-ml-px{margin-left:-1px}.lg\:ml-0{margin-left:calc(var(--spacing)*0)}.lg\:block{display:block}.lg\:aspect-auto{aspect-ratio:auto}.lg\:w-\[438px\]{width:438px}.lg\:max-w-4xl{max-width:var(--container-4xl)}.lg\:grow{flex-grow:1}.lg\:flex-row{flex-direction:row}.lg\:justify-center{justify-content:center}.lg\:rounded-t-none{border-top-left-radius:0;border-top-right-radius:0}.lg\:rounded-tl-lg{border-top-left-radius:var(--radius-lg)}.lg\:rounded-r-lg{border-top-right-radius:var(--radius-lg);border-bottom-right-radius:var(--radius-lg)}.lg\:rounded-br-none{border-bottom-right-radius:0}.lg\:p-8{padding:calc(var(--spacing)*8)}.lg\:p-20{padding:calc(var(--spacing)*20)}}@media (prefers-color-scheme:dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:border-\[\#3E3E3A\]{border-color:#3e3e3a}.dark\:border-\[\#eeeeec\]{border-color:#eeeeec}.dark\:bg-\[\#0a0a0a\]{background-color:#0a0a0a}.dark\:bg-\[\#1D0002\]{background-color:#1d0002}.dark\:bg-\[\#3E3E3A\]{background-color:#3e3e3a}.dark\:bg-\[\#161615\]{background-color:#161615}.dark\:bg-\[\#eeeeec\]{background-color:#eeeeec}.dark\:text-\[\#1C1C1A\]{color:#1c1c1a}.dark\:text-\[\#A1A09A\]{color:#a1a09a}.dark\:text-\[\#EDEDEC\]{color:#ededec}.dark\:text-\[\#F61500\]{color:#f61500}.dark\:text-\[\#FF4433\]{color:#f43}.dark\:shadow-\[inset_0px_0px_0px_1px_\#fffaed2d\]{--tw-shadow:inset 0px 0px 0px 1px var(--tw-shadow-color,#fffaed2d);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.dark\:before\:border-\[\#3E3E3A\]:before{content:var(--tw-content);border-color:#3e3e3a}@media (hover:hover){.dark\:hover\:border-\[\#3E3E3A\]:hover{border-color:#3e3e3a}.dark\:hover\:border-\[\#62605b\]:hover{border-color:#62605b}.dark\:hover\:border-white:hover{border-color:var(--color-white)}.dark\:hover\:bg-white:hover{background-color:var(--color-white)}}}@starting-style{.starting\:translate-y-4{--tw-translate-y:calc(var(--spacing)*4);translate:var(--tw-translate-x)var(--tw-translate-y)}}@starting-style{.starting\:translate-y-6{--tw-translate-y:calc(var(--spacing)*6);translate:var(--tw-translate-x)var(--tw-translate-y)}}@starting-style{.starting\:opacity-0{opacity:0}}}@keyframes spin{to{transform:rotate(360deg)}}@keyframes ping{75%,to{opacity:0;transform:scale(2)}}@keyframes pulse{50%{opacity:.5}}@keyframes bounce{0%,to{animation-timing-function:cubic-bezier(.8,0,1,1);transform:translateY(-25%)}50%{animation-timing-function:cubic-bezier(0,0,.2,1);transform:none}}@property --tw-translate-x{syntax:"*";inherits:false;initial-value:0}@property --tw-translate-y{syntax:"*";inherits:false;initial-value:0}@property --tw-translate-z{syntax:"*";inherits:false;initial-value:0}@property --tw-rotate-x{syntax:"*";inherits:false;initial-value:rotateX(0)}@property --tw-rotate-y{syntax:"*";inherits:false;initial-value:rotateY(0)}@property --tw-rotate-z{syntax:"*";inherits:false;initial-value:rotateZ(0)}@property --tw-skew-x{syntax:"*";inherits:false;initial-value:skewX(0)}@property --tw-skew-y{syntax:"*";inherits:false;initial-value:skewY(0)}@property --tw-space-x-reverse{syntax:"*";inherits:false;initial-value:0}@property --tw-border-style{syntax:"*";inherits:false;initial-value:solid}@property --tw-leading{syntax:"*";inherits:false}@property --tw-font-weight{syntax:"*";inherits:false}@property --tw-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-shadow-color{syntax:"*";inherits:false}@property --tw-inset-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-inset-shadow-color{syntax:"*";inherits:false}@property --tw-ring-color{syntax:"*";inherits:false}@property --tw-ring-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-inset-ring-color{syntax:"*";inherits:false}@property --tw-inset-ring-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-ring-inset{syntax:"*";inherits:false}@property --tw-ring-offset-width{syntax:"<length>";inherits:false;initial-value:0}@property --tw-ring-offset-color{syntax:"*";inherits:false;initial-value:#fff}@property --tw-ring-offset-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-blur{syntax:"*";inherits:false}@property --tw-brightness{syntax:"*";inherits:false}@property --tw-contrast{syntax:"*";inherits:false}@property --tw-grayscale{syntax:"*";inherits:false}@property --tw-hue-rotate{syntax:"*";inherits:false}@property --tw-invert{syntax:"*";inherits:false}@property --tw-opacity{syntax:"*";inherits:false}@property --tw-saturate{syntax:"*";inherits:false}@property --tw-sepia{syntax:"*";inherits:false}@property --tw-drop-shadow{syntax:"*";inherits:false}@property --tw-duration{syntax:"*";inherits:false}@property --tw-content{syntax:"*";inherits:false;initial-value:""}
            </style>
        @endif
    </head>
    <body class="bg-[#08070D] text-white antialiased">
        <!-- Navigation -->
        <nav class="fixed top-0 w-full z-50 px-4 py-4">
            <div class="mx-auto flex h-20 max-w-7xl items-center justify-between rounded-full bg-[#09090f]/95 px-4 shadow-[0_0_60px_rgba(0,0,0,0.35)] backdrop-blur-xl">
                <details class="relative">
                    <summary class="flex items-center gap-3 rounded-full bg-transparent px-4 py-2 text-sm uppercase tracking-[0.24em] font-semibold text-white hover:bg-white/10 transition cursor-pointer">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        MENU
                    </summary>
                    <!-- Desktop dropdown (keeps original small dropdown on wide screens) -->
                    <div class="absolute left-0 top-full mt-3 w-screen max-w-xs rounded-3xl bg-[#08070D]/95 p-5 shadow-2xl backdrop-blur-xl hidden lg:block">
                        <ul class="space-y-4">
                            <li><a href="/" class="block text-base font-semibold text-white hover:text-[#FFCF23] transition">Homepage</a></li>
                            <li><a href="#courses" class="block text-base font-semibold text-white hover:text-[#FFCF23] transition">Courses</a></li>
                            <li><a href="https://www.jointherealworld.com/newsletter" class="block text-base font-semibold text-white hover:text-[#FFCF23] transition">Newsletter</a></li>
                            <li><a href="https://www.jointherealworld.com/download" class="block text-base font-semibold text-white hover:text-[#FFCF23] transition">Download App</a></li>
                            <li><a href="https://www.jointherealworld.com/articles" class="block text-base font-semibold text-white hover:text-[#FFCF23] transition">Articles</a></li>
                        </ul>
                        <div class="mt-6 pt-4">
                            <a href="{{ route('login') }}" class="block w-full text-center rounded-full bg-white px-4 py-3 text-[#08070D] font-semibold hover:bg-slate-100 transition">Join The Real World</a>
                        </div>
                    </div>

                    <!-- Mobile full-screen overlay -->
                    <div id="mobile-menu-overlay" class="fixed inset-0 z-50 p-6 hidden lg:hidden" style="background-color:#08070D;min-height:100vh;backdrop-filter:none;">
                        <div class="flex items-center justify-between mb-6">
                            <button id="mobile-menu-close" aria-label="Close menu" class="inline-flex items-center gap-3 text-sm font-semibold text-white">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                <span>MENU</span>
                            </button>
                            <img src="{{ asset('images/logo.webp') }}" alt="logo" class="h-10 w-auto object-contain" />
                        </div>

                        <nav class="mb-6">
                            <ul class="space-y-6 text-lg">
                                <li><a href="/" class="block font-semibold text-white hover:text-[#FFCF23]">Homepage</a></li>
                                <li><a href="#courses" class="block font-semibold text-white hover:text-[#FFCF23]">Courses</a></li>
                                <li><a href="https://www.jointherealworld.com/newsletter" class="block font-semibold text-white hover:text-[#FFCF23]">Newsletter</a></li>
                                <li><a href="https://www.jointherealworld.com/download" class="block font-semibold text-white hover:text-[#FFCF23]">Download App</a></li>
                                <li><a href="https://www.jointherealworld.com/articles" class="block font-semibold text-white hover:text-[#FFCF23]">Articles</a></li>
                            </ul>
                        </nav>

                        <div class="mt-auto">
                            <a href="{{ route('login') }}" class="block w-full text-center rounded-full bg-white px-4 py-3 text-[#08070D] font-semibold hover:bg-slate-100 transition">Join The Real World</a>
                        </div>
                    </div>
                </details>

                <div class="flex items-center justify-center">
                    <img src="{{ asset('images/logo.webp') }}" alt="The Real World" class="h-14 w-auto object-contain" />
                </div>

                <div class="flex items-center gap-4">
                    @auth
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 rounded-full bg-transparent px-4 py-2 text-sm font-semibold text-white hover:bg-white/10 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm0 2c-3.33 0-10 1.67-10 5v3h20v-3c0-3.33-6.67-5-10-5z" />
                            </svg>
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center gap-2 rounded-full bg-transparent px-4 py-2 text-sm font-semibold text-white hover:bg-white/10 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm0 2c-3.33 0-10 1.67-10 5v3h20v-3c0-3.33-6.67-5-10-5z" />
                            </svg>
                            LOG IN
                        </a>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="pt-36 pb-20 px-4 sm:px-6 lg:px-8 text-center relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-b from-[#FFCF23]/5 via-transparent to-transparent"></div>
            <div class="max-w-4xl mx-auto relative z-10 flex flex-col items-center">
                <!-- THE REAL WORLD subtitle -->
                <p class="hidden lg:block order-1 text-xs sm:text-sm uppercase tracking-[0.35em] text-slate-400 mb-6">The Real World</p>

                <!-- Pill badge -->
                <div class="hidden lg:inline-flex order-2 items-center justify-center px-5 py-2 rounded-full border border-white/20 bg-white/5 backdrop-blur-sm mb-8">
                    <span class="text-sm sm:text-base font-medium text-white tracking-wide">The Fastest Path To Success</span>
                </div>

                <!-- Video - mobile: before heading (order-3), desktop: after description (order-5) -->
                <div class="order-3 lg:order-5 w-full max-w-2xl mb-8">
                    <div class="relative w-full rounded-2xl overflow-hidden border border-white/10 bg-black/40 backdrop-blur-sm" style="aspect-ratio: 16/9;">
                        <video class="w-full h-full object-cover" autoplay muted controls playsinline preload="metadata" poster="">
                            <source src="{{ asset('videos/hero.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>                        
                    </div>
                </div>

                <!-- Main heading -->
                <h2 class="order-4 lg:order-3 text-white text-center max-w-[700px] mx-auto capitalize tracking-[-1px] lg:tracking-[-3px] text-[40px] lg:text-[70px] leading-[48px] lg:leading-[76px] mb-6">
                    Make Money & Level Up In 2026
                </h2>

                <!-- Description -->
                <p class="order-5 lg:order-4 text-base sm:text-lg text-slate-400 mb-10 max-w-xl mx-auto leading-relaxed">
                    Generate an income right now with expert-led training on the latest fastest-growing online businesses.
                </p>

                <!-- CTA button -->
                <div class="order-6 flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-[#ecc879] to-[#FF8D3A] text-[#08070D] rounded-full font-bold text-lg hover:shadow-lg hover:shadow-[#FFCF23]/20 transition transform hover:scale-105">
                        Join The Real World
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>

                <div class="order-7 flex flex-row items-center gap-2 justify-center px-4 mt-4">
                    <img
                        alt="Enrolled People"
                        loading="lazy"
                        width="89"
                        height="20"
                        decoding="async"
                        src="{{ asset('images/logo.webp') }}"
                        class="h-[35px] w-auto"
                    />
                    <p class="text-[13px] sm:text-sm text-slate-300">
                        <span class="text-white font-bold">155,000+</span>
                        like-minded students
                    </p>
                </div>
            </div>
        </section>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const nav = document.querySelector('nav');
                const details = nav?.querySelector('details');
                const summary = details?.querySelector('summary');
                const overlay = document.getElementById('mobile-menu-overlay');
                const closeBtn = document.getElementById('mobile-menu-close');

                function openMobile() {
                    overlay.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                }

                function closeMobile() {
                    overlay.classList.add('hidden');
                    document.body.style.overflow = '';
                    if (details) details.open = false;
                }

                if (summary) {
                    summary.addEventListener('click', function (e) {
                        if (window.innerWidth < 1024) {
                            e.preventDefault();
                            if (overlay.classList.contains('hidden')) {
                                openMobile();
                                if (details) details.open = true;
                            } else {
                                closeMobile();
                            }
                        }
                    });
                }

                closeBtn?.addEventListener('click', closeMobile);

                overlay?.querySelectorAll('a').forEach(function (a) {
                    a.addEventListener('click', function () {
                        // allow small delay for navigation, then close
                        setTimeout(closeMobile, 50);
                    });
                });

                document.addEventListener('keydown', function (e) {
                    if (e.key === 'Escape') closeMobile();
                });
            });
        </script>


        

        <!-- Stats Section -->
        <section id="community" class="py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-[#FFCF23]/10 to-[#FF8D3A]/10 border-y border-white/10">
            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold text-[#FFCF23] mb-2">155K+</div>
                    <p class="text-slate-300">Active Members</p>
                </div>
                <div>
                    <div class="text-4xl font-bold text-[#FF8D3A] mb-2">12+</div>
                    <p class="text-slate-300">Wealth Methods</p>
                </div>
                <div>
                    <div class="text-4xl font-bold text-[#FFCF23] mb-2">$99/mo</div>
                    <p class="text-slate-300">All Courses Included</p>
                </div>
            </div>
        </section>

        <!-- Feature Icons Section -->
            <section class="py-8 px-4 sm:px-6 lg:px-8">
                <div class="max-w-4xl mx-auto">
                    <div class="grid grid-cols-3 gap-2 sm:gap-8 text-center">
                        <!-- 1st Feature -->
                        <div>
                            <svg class="mx-auto mb-2 w-8 h-8 sm:w-10 sm:h-10 text-[#FFCF23]" fill="currentColor" viewBox="0 0 24 24"><rect x="3" y="17" width="18" height="3" rx="1.5" fill="#FFCF23"/><rect x="7" y="7" width="2" height="7" rx="1" fill="#FFCF23"/><rect x="11" y="4" width="2" height="10" rx="1" fill="#FFCF23"/><rect x="15" y="10" width="2" height="4" rx="1" fill="#FFCF23"/></svg>
                            <div class="uppercase text-[10px] sm:text-xs text-slate-400 tracking-widest mb-1">Scale from zero</div>
                            <div class="text-sm sm:text-lg font-bold text-white">To 10k/Mo</div>
                        </div>
                        <!-- 2nd Feature -->
                        <div>
                            <svg class="mx-auto mb-2 w-8 h-8 sm:w-10 sm:h-10 text-[#FFCF23]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-13a1 1 0 100 2 1 1 0 000-2zm1 3h-2v6h2V7z"/></svg>
                            <div class="uppercase text-[10px] sm:text-xs text-slate-400 tracking-widest mb-1">World Class</div>
                            <div class="text-sm sm:text-lg font-bold text-white">Learning</div>
                        </div>
                        <!-- 3rd Feature -->
                        <div>
                            <svg class="mx-auto mb-2 w-8 h-8 sm:w-10 sm:h-10 text-[#FFCF23]" fill="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657a8 8 0 10-11.314 0M8 12l-2 2m0 0l2 2m-2-2h12m-2-2l2 2m0 0l-2 2" stroke="#FFCF23" stroke-width="2" fill="none"/><path d="M15 9h.01" fill="#FFCF23"/></svg>
                            <div class="uppercase text-[10px] sm:text-xs tracking-widest mb-1" style="color:#FFCF23">1-on-1 Advice</div>
                            <div class="text-sm sm:text-lg font-bold text-white">From Experts</div>
                        </div>
                    </div>
                </div>
            </section>

        <section class="py-16 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-white mb-8 text-4xl font-bold">Our Student Reviews</h1>
            </div>
            <div class="max-w-6xl mx-auto grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                <div class="bg-[#111014] border border-white/10 rounded-2xl shadow-lg p-6">
                    <div class="flex items-center gap-4 mb-4">
                        <img src="{{ asset('images/Matt_V.avif') }}" alt="Matt V." class="w-16 h-16 rounded-full object-cover border-2 border-[#FFCF23]">
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="text-white font-semibold text-lg">Matt_V</span>
                                <span class="text-slate-300 text-sm">1 Review</span>
                            </div>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="text-slate-300 text-sm">Belgium</span>
                                <img src="https://flagcdn.com/be.svg" alt="Belgium" class="w-5 h-4 rounded-sm border border-white/20">
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-1 mb-4">
                        <svg class="w-5 h-5 text-[#FFCF23]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.385-2.46a1 1 0 00-1.175 0l-3.385 2.46c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118l-3.385-2.46c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                        <svg class="w-5 h-5 text-[#FFCF23]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.385-2.46a1 1 0 00-1.175 0l-3.385 2.46c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118l-3.385-2.46c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                        <svg class="w-5 h-5 text-[#FFCF23]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.385-2.46a1 1 0 00-1.175 0l-3.385 2.46c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118l-3.385-2.46c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                        <svg class="w-5 h-5 text-[#FFCF23]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.385-2.46a1 1 0 00-1.175 0l-3.385 2.46c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118l-3.385-2.46c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                        <svg class="w-5 h-5 text-[#FFCF23]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.385-2.46a1 1 0 00-1.175 0l-3.385 2.46c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118l-3.385-2.46c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                    </div>
                    <div class="border-t border-white/10 pt-4 mb-2">
                        <div class="font-semibold text-white mb-1">NEW ME SINCE JOINING</div>
                        <div class="text-slate-300 text-base mb-2">Since I've joined I'm a new man, been a new man since 669 days. JOIN, BECOME THE BEST IN YOUR FIELD. BE DIFFERENT.</div>
                    </div>
                    <div class="text-xs text-slate-400">May 24, 2026</div>
                </div>

                <div class="bg-[#111014] border border-white/10 rounded-2xl shadow-lg p-6">
                    <div class="flex items-center gap-4 mb-4">
                        <img src="{{ asset('images/ammorsy3.avif') }}" alt="Ammorsy" class="w-16 h-16 rounded-full object-cover border-2 border-[#FFCF23]">
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="text-white font-semibold text-lg">Ammorsy</span>
                                <span class="text-slate-300 text-sm">Verified Student</span>
                            </div>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="text-slate-300 text-sm">Student Review</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-1 mb-4">
                        <svg class="w-5 h-5 text-[#FFCF23]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.385-2.46a1 1 0 00-1.175 0l-3.385 2.46c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118l-3.385-2.46c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                        <svg class="w-5 h-5 text-[#FFCF23]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.385-2.46a1 1 0 00-1.175 0l-3.385 2.46c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118l-3.385-2.46c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                        <svg class="w-5 h-5 text-[#FFCF23]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.385-2.46a1 1 0 00-1.175 0l-3.385 2.46c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118l-3.385-2.46c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                        <svg class="w-5 h-5 text-[#FFCF23]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.385-2.46a1 1 0 00-1.175 0l-3.385 2.46c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118l-3.385-2.46c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                        <svg class="w-5 h-5 text-[#FFCF23]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.385-2.46a1 1 0 00-1.175 0l-3.385 2.46c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118l-3.385-2.46c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                    </div>
                    <div class="border-t border-white/10 pt-4 mb-2">
                        <div class="font-semibold text-white mb-1">REAL RESULTS, REAL COMMUNITY</div>
                        <div class="text-slate-300 text-base mb-2">The lessons and community made it easier to stay consistent and turn my ideas into action every single week.</div>
                    </div>
                    <div class="text-xs text-slate-400">May 19, 2026</div>
                </div>

                <div class="bg-[#111014] border border-white/10 rounded-2xl shadow-lg p-6">
                    <div class="flex items-center gap-4 mb-4">
                        <img src="{{ asset('images/The Hun.avif') }}" alt="The Hun" class="w-16 h-16 rounded-full object-cover border-2 border-[#FFCF23]">
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="text-white font-semibold text-lg">The Hun</span>
                                <span class="text-slate-300 text-sm">Student</span>
                            </div>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="text-slate-300 text-sm">Community Review</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-1 mb-4">
                        <svg class="w-5 h-5 text-[#FFCF23]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.385-2.46a1 1 0 00-1.175 0l-3.385 2.46c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118l-3.385-2.46c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                        <svg class="w-5 h-5 text-[#FFCF23]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.385-2.46a1 1 0 00-1.175 0l-3.385 2.46c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118l-3.385-2.46c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                        <svg class="w-5 h-5 text-[#FFCF23]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.385-2.46a1 1 0 00-1.175 0l-3.385 2.46c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118l-3.385-2.46c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                        <svg class="w-5 h-5 text-[#FFCF23]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.385-2.46a1 1 0 00-1.175 0l-3.385 2.46c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118l-3.385-2.46c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                        <svg class="w-5 h-5 text-[#FFCF23]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.385-2.46a1 1 0 00-1.175 0l-3.385 2.46c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118l-3.385-2.46c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                    </div>
                    <div class="border-t border-white/10 pt-4 mb-2">
                        <div class="font-semibold text-white mb-1">BEST DECISION I MADE</div>
                        <div class="text-slate-300 text-base mb-2">I used to feel stuck. After joining, I finally had structure, mentors, and the confidence to take action.</div>
                    </div>
                    <div class="text-xs text-slate-400">May 16, 2026</div>
                </div>
            </div>
        </section>

        <section class="py-16 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-white mb-4">The Real World Wins</p>
                <h1 class="text-white text-4xl font-bold mb-4">Our Students Are Winning</h1>
                <img src="{{asset('images/win1.png')}}" alt="winners1">
                <img src="{{asset('images/win2.png')}}" alt="winners2">
                <img src="{{asset('images/win3.png')}}" alt="winners3">
                <img src="{{asset('images/win4.png')}}" alt="winners4">
                <img src="{{asset('images/win5.png')}}" alt="winners5">
                <img src="{{asset('images/win6.png')}}" alt="winners6">
                <img src="{{asset('images/win7.png')}}" alt="winners7">
                <img src="{{asset('images/win8.png')}}" alt="winners8">
                <img src="{{asset('images/win9.png')}}" alt="winners9">
                <img src="{{asset('images/win10.png')}}" alt="winners10">
                <img src="{{asset('images/win11.png')}}" alt="winners11">
                <img src="{{asset('images/win12.png')}}" alt="winners12">
                <img src="{{asset('images/win13.png')}}" alt="winners13">
                <img src="{{asset('images/win14.png')}}" alt="winners14">
                <img src="{{asset('images/win15.png')}}" alt="winners15">
                <img src="{{asset('images/win16.png')}}" alt="winners16">
                <img src="{{asset('images/win17.png')}}" alt="winners17">
            </div>

            </div>
        </section>

        

        <!-- Plans Section -->
        <section class="py-16 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-slate-400 mb-4">Our Plans</p>
                <h2 class="text-4xl font-bold mb-12">98% sold out</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Earn Plan -->
                    <div class="rounded-lg border border-white/10 bg-white/5 backdrop-blur p-6 relative">
                        <div class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                            SOLD OUT
                        </div>
                        <div class="w-12 h-12 mx-auto mb-4 rounded-full bg-gradient-to-r from-[#FFCF23]/20 to-[#FF8D3A]/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#FFCF23]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-2">Earn</h3>
                    </div>

                    <!-- Prosper Plan -->
                    <div class="rounded-lg border border-white/10 bg-white/5 backdrop-blur p-6 relative">
                        <div class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                            SOLD OUT
                        </div>
                        <div class="w-12 h-12 mx-auto mb-4 rounded-full bg-gradient-to-r from-[#FF8D3A]/20 to-[#FFCF23]/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#FF8D3A]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-2">Prosper</h3>
                    </div>

                    <!-- Conquer Plan -->
                    <div class="rounded-lg border-2 border-[#FFCF23] bg-gradient-to-br from-[#FFCF23]/10 to-[#FF8D3A]/10 backdrop-blur p-6 relative">
                        <div class="w-12 h-12 mx-auto mb-4 rounded-full bg-gradient-to-r from-[#FFCF23] to-[#FF8D3A] flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-2 text-[#FFCF23]">Conquer</h3>
                        <a href="{{ route('login') }}" class="inline-block mt-4 px-6 py-2 bg-gradient-to-r from-[#FFCF23] to-[#FF8D3A] text-[#08070D] rounded-full font-bold text-sm hover:shadow-lg transition">
                            Join Now
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Wins -->
        <section class="py-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold text-center mb-4">Student Success Stories</h2>
                <p class="text-center text-slate-400 mb-12 max-w-2xl mx-auto">Real students achieving real results</p>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="rounded-lg border border-white/10 bg-white/5 backdrop-blur p-6 hover:border-[#FFCF23]/50 transition">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-r from-[#FFCF23] to-[#FF8D3A]"></div>
                            <div>
                                <p class="font-bold">Rolands - 25</p>
                                <p class="text-sm text-slate-400">🇳🇱 Netherlands</p>
                            </div>
                        </div>
                        <p class="text-sm mb-4">Started with $200/month income</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-[#FFCF23]">$3,100/month</span>
                            <span class="text-xs bg-[#FFCF23]/20 text-[#FFCF23] px-3 py-1 rounded-full">3 months</span>
                        </div>
                    </div>

                    <div class="rounded-lg border border-white/10 bg-white/5 backdrop-blur p-6 hover:border-[#FFCF23]/50 transition">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-r from-[#FF8D3A] to-[#FFCF23]"></div>
                            <div>
                                <p class="font-bold">Stefan - 21</p>
                                <p class="text-sm text-slate-400">🇷🇴 Romania</p>
                            </div>
                        </div>
                        <p class="text-sm mb-4">Started with $1,100/month income</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-[#FF8D3A]">$15,100/month</span>
                            <span class="text-xs bg-[#FF8D3A]/20 text-[#FF8D3A] px-3 py-1 rounded-full">7 months</span>
                        </div>
                    </div>

                    <div class="rounded-lg border border-white/10 bg-white/5 backdrop-blur p-6 hover:border-[#FFCF23]/50 transition">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-r from-[#FFCF23] to-[#FF8D3A]"></div>
                            <div>
                                <p class="font-bold">Omran - 24</p>
                                <p class="text-sm text-slate-400">🇬🇧 United Kingdom</p>
                            </div>
                        </div>
                        <p class="text-sm mb-4">Started with $800/month income</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-[#FFCF23]">$30,100/month</span>
                            <span class="text-xs bg-[#FFCF23]/20 text-[#FFCF23] px-3 py-1 rounded-full">1 year</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Certificate Section -->
        <section class="py-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <div class="mb-8">
                    <svg class="w-20 h-20 mx-auto text-[#FFCF23] mb-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold mb-6">Earn Your Signed Diploma</h2>
                <p class="text-xl text-slate-300 mb-8 max-w-3xl mx-auto">
                    Only when you combine hard work with a world-class toolset, will you have the chance to achieve the freedom you've always dreamt of.
                    <br><br>
                    When you do, a certificate of graduation awaits you.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-gradient-to-r from-[#FFCF23]/20 to-[#FF8D3A]/20 flex items-center justify-center">
                            <svg class="w-8 h-8 text-[#FFCF23]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13 7h-2v4H7v2h4v4h2v-4h4v-2h-4V7zm-1-5C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-2">Grow Your Business to Multi 7 Figures</h3>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-gradient-to-r from-[#FF8D3A]/20 to-[#FFCF23]/20 flex items-center justify-center">
                            <svg class="w-8 h-8 text-[#FF8D3A]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-2">Join A Network of Like-Minded Students</h3>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-gradient-to-r from-[#FFCF23]/20 to-[#FF8D3A]/20 flex items-center justify-center">
                            <svg class="w-8 h-8 text-[#FFCF23]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-2">Become A Master of Your Industry</h3>
                    </div>
                </div>
            </div>
        </section>

        <!-- The World Is About To Change -->
        <section class="py-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold mb-4">The World Is About To Change</h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Time's Ticking -->
                    <div class="text-center">
                        <div class="relative mb-8">
                            <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-r from-red-500/20 to-orange-500/20 flex items-center justify-center mb-4">
                                <svg class="w-12 h-12 text-red-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mb-4 text-red-400">Time's Ticking</h3>
                            <h4 class="text-lg font-semibold mb-4">You're Running Out Of Time</h4>
                            <p class="text-slate-300">
                                The world will change forever in 2026. They are developing more ways to trap you. What have you been doing to prepare? You must understand, it's now or never.
                            </p>
                        </div>
                    </div>

                    <!-- The Takeover -->
                    <div class="text-center">
                        <div class="relative mb-8">
                            <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-r from-blue-500/20 to-purple-500/20 flex items-center justify-center mb-4">
                                <svg class="w-12 h-12 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mb-4 text-blue-400">The Takeover</h3>
                            <h4 class="text-lg font-semibold mb-4">Imminent AI Takeover</h4>
                            <p class="text-slate-300">
                                Imagine there was a potion that you could apply to your business & it helped you 10x output OVERNIGHT. You can have a robot make money for you while you SLEEP... Yet you have chosen not to take action.
                            </p>
                        </div>
                    </div>

                    <!-- The Way Out -->
                    <div class="text-center">
                        <div class="relative mb-8">
                            <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-r from-green-500/20 to-teal-500/20 flex items-center justify-center mb-4">
                                <svg class="w-12 h-12 text-green-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22.7 19l-9.1-9.1c.9-2.3.4-5-1.5-6.9-2-2-5-2.4-7.4-1.3L9 6 6 9 1.6 4.7C.4 7.1.9 10.1 2.9 12.1c1.9 1.9 4.6 2.4 6.9 1.5l9.1 9.1c.4.4 1 .4 1.4 0l2.3-2.3c.5-.4.5-1.1.1-1.4z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mb-4 text-green-400">The Way Out</h3>
                            <h4 class="text-lg font-semibold mb-4">You Need To Learn A New Skill</h3>
                            <p class="text-slate-300">
                                Just imagine... The doors that open when you invest in yourself; higher income, greater freedom, and the ability to create the life you want. Don't wait for success to find you. Take control.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-12">
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-[#FFCF23] to-[#FF8D3A] text-[#08070D] rounded-full font-bold text-lg hover:shadow-lg hover:shadow-[#FFCF23]/20 transition transform hover:scale-105">
                        Join The Real World
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                    <p class="text-slate-300 mt-4">155,000+ like-minded students</p>
                </div>
            </div>
        </section>

        <!-- One Year Is All It Takes -->
        <section class="py-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-4xl font-bold mb-6">One Year Is All It Takes</h2>
                        <p class="text-xl text-slate-300 mb-8">
                            You can get rich with just one year of focus... But only if you invest focus in the right business models using the right information.
                            <br><br>
                            In The Real World you will get access to multimillionaire professors who will give you a step-by-step path to reach your goals as fast as humanly possible.
                        </p>
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-[#FFCF23] to-[#FF8D3A] text-[#08070D] rounded-full font-bold text-lg hover:shadow-lg hover:shadow-[#FFCF23]/20 transition transform hover:scale-105">
                            Join The Real World
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="text-center">
                    </div>
                </div>
            </div>
        </section>

        <!-- 3 Phase Transformation -->
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-transparent via-[#FFCF23]/5 to-transparent">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold text-center mb-12">Your 3-Phase Journey</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="group rounded-lg border border-white/10 bg-white/5 backdrop-blur p-8 hover:border-[#FFCF23] transition hover:bg-white/10">
                        <div class="text-sm font-semibold text-[#FFCF23] mb-3">PHASE 1</div>
                        <h3 class="text-2xl font-bold mb-4">Join The Real World</h3>
                        <p class="text-slate-300">Get instant access to all 12+ courses and daily mentorship sessions with millionaire professors.</p>
                    </div>

                    <div class="group rounded-lg border border-white/10 bg-white/5 backdrop-blur p-8 hover:border-[#FF8D3A] transition hover:bg-white/10">
                        <div class="text-sm font-semibold text-[#FF8D3A] mb-3">PHASE 2</div>
                        <h3 class="text-2xl font-bold mb-4">Connect With 155K+ Members</h3>
                        <p class="text-slate-300">Network with thousands of ambitious entrepreneurs and find accountability partners on your journey.</p>
                    </div>

                    <div class="group rounded-lg border border-white/10 bg-white/5 backdrop-blur p-8 hover:border-[#FFCF23] transition hover:bg-white/10">
                        <div class="text-sm font-semibold text-[#FFCF23] mb-3">PHASE 3</div>
                        <h3 class="text-2xl font-bold mb-4">Build to 7-Figures</h3>
                        <p class="text-slate-300">Scale your business with proven templates, proven scripts, and daily updated strategies.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- The Exit Plan They Never Taught You -->
        <section class="py-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl font-bold mb-8">
                    The Exit Plan They <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#FFCF23] to-[#FF8D3A]">Never Taught You</span>
                </h2>
                <p class="text-xl text-slate-300 mb-12 max-w-3xl mx-auto">
                    The truth is, the system was never built for your success. It was built to keep you dependent; on paychecks, on policies, on promises that never come true.
                    <br><br>
                    The Real World isn't just another platform. It's a new operating system for life. Inside, you'll learn real skills that make real money. You'll be mentored by proven entrepreneurs. You'll build cashflow, independence, and most importantly control.
                </p>
                
            </div>
        </section>

        <!-- Their Way VS Our Way -->
        <section class="py-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold text-center mb-12">
                    Their Way <span class="text-[#FFCF23]">VS</span> Our Way
                </h2>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Their Way -->
                    <div class="rounded-lg border border-white/10 bg-white/5 backdrop-blur p-8">
                        <h3 class="text-2xl font-bold mb-6 text-slate-400">Their Way</h3>
                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">Searching YouTube for hours</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">Random advice, no structure</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">Getting stuck with no help</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">No idea what actually works</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">No one to ask questions</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">Surrounded by low energy</span>
                            </div>
                        </div>
                        <a href="https://www.jobs.com/" class="inline-block mt-6 px-6 py-3 bg-slate-600 text-white rounded-full font-bold hover:bg-slate-700 transition">
                            Do It Their Way
                        </a>
                    </div>

                    <!-- Our Way -->
                    <div class="rounded-lg border-2 border-[#FFCF23] bg-gradient-to-br from-[#FFCF23]/10 to-[#FF8D3A]/10 backdrop-blur p-8">
                        <div class="flex items-center justify-center mb-6">
                            <img src="https://via.placeholder.com/80x80/FFCF23/08070D?text=JTRW" alt="JTRW Logo" class="rounded-full">
                            <span class="ml-3 text-2xl font-bold text-[#FFCF23]">The Real World</span>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FFCF23]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-200">Direct access to millionaire professors</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FFCF23]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-200">10+ wealth creation methods</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FFCF23]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-200">24/7 high energy community</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FFCF23]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-200">Clear tasks and path to results</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FFCF23]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-200">Plug & play templates, scripts & tools</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FFCF23]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-200">Updated daily based on latest information</span>
                            </div>
                        </div>
                        <a href="{{ route('login') }}" class="inline-block mt-6 px-6 py-3 bg-gradient-to-r from-[#FFCF23] to-[#FF8D3A] text-[#08070D] rounded-full font-bold hover:shadow-lg transition">
                            Join The Real World
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Courses Overview -->
        <section class="py-20 px-4 sm:px-6 lg:px-8" id="courses">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold text-center mb-4">What You'll Learn</h2>
                <p class="text-center text-slate-400 mb-12">12+ wealth creation methods taught by experts</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php
                        $courses = [
                            ['title' => 'AI Automation', 'desc' => 'Build AI systems and sell them to online businesses. Teach anybody, even with limited technical knowledge, the skills required to build AI systems.', 'icon' => '<svg width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4a4 4 0 00-4 4v1a4 4 0 108 0V8a4 4 0 00-4-4z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12v1a4 4 0 008 0v-1"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19h4"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 21h8"/></svg>'],
                            ['title' => 'Business Mastery', 'desc' => 'Master the art of leadership and scaling operations to make more money. The Real World Business mastery training is about mastering diplomacy.', 'icon' => '<svg width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14v11H5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 8V5h8v3"/></svg>'],
                            ['title' => 'Client Acquisition', 'desc' => 'Acquire, retain, and grow your client base with strategies that are as effective as they are explosive in the Client Acquisition + SM Campus.', 'icon' => '<svg width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h10M7 11h6M7 15h10"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5h16v14H4z"/></svg>'],
                            ['title' => 'Content Creation + SM', 'desc' => 'In the age of technology, the value of videos and landing pages surpass the worth of real estate. Leverage digital assets and social media.', 'icon' => '<svg width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553 2.276A1 1 0 0120 14.118V18a2 2 0 01-2 2H6a2 2 0 01-2-2v-7a2 2 0 012-2h9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10V4a1 1 0 00-1-1H6a2 2 0 00-2 2v1"/></svg>'],
                            ['title' => 'Copywriting', 'desc' => 'Words are your warriors, and every sentence is a strategy. Master the craft of copywriting with us, and learn to turn prose into profit.', 'icon' => '<svg width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.5 3.5L20.5 7.5L8.5 19.5H4.5V15.5L16.5 3.5z"/></svg>'],
                            ['title' => 'Crypto Altcoins', 'desc' => 'Our experts have been through every market cycle, every bull run, every crash—and they still come out on top. Learn altcoin trading.', 'icon' => '<svg width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="8" stroke-width="2"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v8m-2-4h4"/></svg>'],
                            ['title' => 'Crypto Investing', 'desc' => 'Real time information to identify trends and what influences the price of coins. Within the Cryptocurrency campus you have access to 155,000+ other students.', 'icon' => '<svg width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 19h16M4 15l4-4 4 4 4-8 4 8"/></svg>'],
                            ['title' => 'Crypto Trading', 'desc' => 'Markets move fast. Learn to analyse charts, manage risk, and execute trades that compound into real wealth.', 'icon' => '<svg width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 17l6-6 4 4 6-8"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 17h2v2h-2z"/></svg>'],
                            ['title' => 'E-Commerce', 'desc' => 'Imagine launching a store and instantly connecting with the global market by morning. Online commerce is your gateway to rapid retail success.', 'icon' => '<svg width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14l-1.5 9h-11L5 7z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7V5a2 2 0 012-2h6a2 2 0 012 2v2"/></svg>'],
                            ['title' => 'Fitness', 'desc' => 'A strong body is a strong mind. Complete fitness campus including personal trainers and meal plans. Health is wealth.', 'icon' => '<svg width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7l10 10M17 7L7 17"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10v4M20 10v4"/></svg>'],
                        ];
                    @endphp
                    
                    @foreach ($courses as $course)
                        <div class="rounded-lg border border-white/10 bg-white/5 backdrop-blur p-8 hover:border-[#FFCF23]/50 transition hover:bg-white/10">
                            <div class="text-4xl mb-4">{!! $course['icon'] !!}</div>
                            <h3 class="text-xl font-bold mb-2">{{ $course['title'] }}</h3>
                            <p class="text-slate-300 text-sm">{{ $course['desc'] }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-12">
                    <div class="inline-flex items-center gap-3 px-6 py-3 rounded-full bg-gradient-to-r from-[#FFCF23]/20 to-[#FF8D3A]/20 border border-[#FFCF23]/30">
                        <svg class="w-6 h-6 text-[#FFCF23]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        <span class="text-[#FFCF23] font-semibold">NEW SKILLS REGULARLY ADDED</span>
                    </div>
                    <p class="text-slate-300 mt-4 max-w-2xl mx-auto">
                        When a new technology revolutionises an industry, The Real World will be the first and only place to teach you how to take advantage of it. Our students receive the latest information at 8am every day.
                    </p>
                </div>
            </div>
        </section>

        <!-- Our Students Are Winning -->
        <section class="py-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold text-center mb-12">
                    Our Students Are <span class="text-[#FFCF23]">Winning</span>
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mb-12">
                    @for ($i = 1; $i <= 12; $i++)
                        <div class="aspect-square rounded-lg bg-gradient-to-br from-[#FFCF23]/20 to-[#FF8D3A]/20 border border-white/10 flex items-center justify-center">
                            <img src="https://via.placeholder.com/100x100/FFCF23/08070D?text=Win{{ $i }}" alt="Student Success {{ $i }}" class="w-full h-full object-cover rounded-lg">
                        </div>
                    @endfor
                </div>

                <div class="text-center">
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-[#FFCF23] to-[#FF8D3A] text-[#08070D] rounded-full font-bold text-lg hover:shadow-lg hover:shadow-[#FFCF23]/20 transition transform hover:scale-105">
                        Join The Real World
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                    <p class="text-slate-300 mt-4">155,000+ like-minded students</p>
                </div>
            </div>
        </section>

        <!-- Are You Prepared To Work Hard -->
        <section class="py-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <div class="mb-8">
                    <img src="https://via.placeholder.com/400x300/1a1a1a/ffffff?text=Ask+Yourself" alt="Ask Yourself" class="w-full max-w-md mx-auto rounded-lg">
                </div>
                <h2 class="text-4xl font-bold mb-8">Are You Prepared To Work Hard?</h2>
                <p class="text-xl text-slate-300 mb-8 max-w-3xl mx-auto">
                    Money-making is a skill. Like every other skill it can be learned, and the speed at which it is learned depends on the effort you put in, your coaches and the learning environment you are taught in.
                    <br><br>
                    Our coaches use the business models they teach, they know what it takes to be profitable, and they are the first to identify and utilize new disruptive technologies and strategies whenever they appear.
                    <br><br>
                    There is no better place on the planet to learn how to make money online today.
                </p>
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-[#FFCF23] to-[#FF8D3A] text-[#08070D] rounded-full font-bold text-lg hover:shadow-lg hover:shadow-[#FFCF23]/20 transition transform hover:scale-105">
                    Join The Real World
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </section>

        <!-- Exclusive Features -->
        <section class="py-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold mb-4">You Will Get Access To</h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Step-by-step Learning -->
                    <div class="text-center">
                        <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-gradient-to-r from-[#FFCF23]/20 to-[#FF8D3A]/20 flex items-center justify-center">
                            <svg class="w-10 h-10 text-[#FFCF23]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 5v2h6.59L4 18.59 5.41 20 17 8.41V15h2V5H9z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-6">Step-by-Step Learning</h3>
                        <div class="space-y-3 text-left">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FFCF23] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">Easy to follow program for financial success</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FFCF23] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">New high income skills constantly added</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FFCF23] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">Learn with our hyper advanced application</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FFCF23] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">Learn with our hyper advanced application</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FFCF23] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">Learn with our hyper advanced application</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FFCF23] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">Learn with our hyper advanced application</span>
                            </div>
                        </div>
                    </div>

                    <!-- Daily Live Sessions -->
                    <div class="text-center">
                        <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-gradient-to-r from-[#FF8D3A]/20 to-[#FFCF23]/20 flex items-center justify-center">
                            <svg class="w-10 h-10 text-[#FF8D3A]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4 14l2-4h-3l-1-4h-2l-1 4H9l2 4h5z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-6">Daily Live Sessions</h3>
                        <div class="space-y-3 text-left">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FF8D3A] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">Daily live sessions with millionaire coaches</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FF8D3A] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">Scale from Zero to $10k/month as fast as possible</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FF8D3A] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">Network with 155,000+ students</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FF8D3A] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">Scale from Zero to $10k/month as fast as possible</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FF8D3A] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">Network with 155,000+ students</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FF8D3A] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">Scale from Zero to $10k/month as fast as possible</span>
                            </div>
                        </div>
                    </div>

                    <!-- Exclusive Community -->
                    <div class="text-center">
                        <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-gradient-to-r from-[#FFCF23]/20 to-[#FF8D3A]/20 flex items-center justify-center">
                            <svg class="w-10 h-10 text-[#FFCF23]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zm4 18v-6h2.5l-2.54-7.63A2.01 2.01 0 0017.94 6H16v2h1.89l.76 2.27L12 15.21l-6.65-4.94L6.11 8H8V6H5.05c-.83 0-1.55.52-1.85 1.29L.5 16H3v6c0 1.11.89 2 2 2h4c1.11 0 2-.89 2-2v-2h4v2c0 1.11.89 2 2 2h4c1.11 0 2-.89 2-2z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-6">An Exclusive Community</h3>
                        <div class="space-y-3 text-left">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FFCF23] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">Mentors are hyper-successful experts in their field</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FFCF23] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">Get mentored every step of your journey</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FFCF23] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">Network with 155,000+ students</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FFCF23] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">Network with 155,000+ students</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FFCF23] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">Network with 155,000+ students</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-[#FFCF23] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-300">Network with 155,000+ students</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-12">
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-[#FFCF23] to-[#FF8D3A] text-[#08070D] rounded-full font-bold text-lg hover:shadow-lg hover:shadow-[#FFCF23]/20 transition transform hover:scale-105">
                        Join The Real World
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                    <p class="text-slate-300 mt-4">155,000+ like-minded students</p>
                </div>
            </div>
        </section>

        <!-- The Choice Is Yours -->
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-[#08070D] to-[#0F1219]">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold mb-8">The Choice Is Yours</h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Do Nothing -->
                    <div class="rounded-lg border border-white/10 bg-white/5 backdrop-blur p-8">
                        <div class="flex items-center justify-center mb-6">
                            <div class="w-16 h-16 rounded-full bg-slate-600/20 flex items-center justify-center">
                                <svg class="w-8 h-8 text-slate-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-400 ml-4">Do Nothing</h3>
                        </div>
                        <p class="text-slate-400 mb-6">Watch Netflix</p>
                        <div class="text-4xl font-bold text-slate-400 mb-6">Lose 8 hours a day</div>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-slate-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-400">Work for someone else (8h a day)</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-slate-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-400">Stay stagnant</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-slate-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-400">Work a 9-5</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-slate-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-400">$35,000 for University</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-slate-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-400">Stay unfulfilled</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-slate-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-slate-400">Hang around losers</span>
                            </div>
                        </div>
                        <a href="https://www.jobs.com/" class="inline-block mt-6 px-6 py-3 bg-slate-600 text-white rounded-full font-bold hover:bg-slate-700 transition">
                            Do It Your Way
                        </a>
                    </div>

                    <!-- Take Action -->
                    <div class="rounded-lg border-2 border-[#FFCF23] bg-gradient-to-br from-[#FFCF23]/10 to-[#FF8D3A]/10 backdrop-blur p-8 relative">
                        <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-[#FFCF23] to-[#FF8D3A] text-[#08070D] px-4 py-1 rounded-full text-sm font-bold">
                            RECOMMENDED
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Pay</h3>
                        <div class="text-5xl font-bold text-[#FFCF23] mb-4">$99</div>
                        <p class="text-slate-300 mb-8">Immediately tap into a reservoir of cutting-edge knowledge, positioning yourself at the vanguard of innovation and fast-tracking your path to wealth.</p>
                        <a href="{{ route('login') }}" class="inline-block w-full px-6 py-3 bg-gradient-to-r from-[#FFCF23] to-[#FF8D3A] text-[#08070D] rounded-full font-bold mb-6 hover:shadow-lg hover:shadow-[#FFCF23]/20 transition transform hover:scale-105">
                            Join The Real World
                        </a>
                        <div class="space-y-3 text-left">
                            <p class="text-slate-200 text-sm font-semibold">✅ Access to 12+ courses</p>
                            <p class="text-slate-200 text-sm font-semibold">✅ Daily mentorship sessions</p>
                            <p class="text-slate-200 text-sm font-semibold">✅ 155K+ community members</p>
                            <p class="text-slate-200 text-sm font-semibold">✅ Lifetime updates</p>
                            <p class="text-slate-200 text-sm font-semibold">✅ Cancel anytime</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pricing -->
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-[#08070D] to-[#0F1219]" id="pricing">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl font-bold mb-4">Two Paths Forward</h2>
                <p class="text-slate-300 mb-12">Their Way VS Our Way</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Their Way -->
                    <div class="rounded-lg border border-white/10 bg-white/5 backdrop-blur p-8">
                        <h3 class="text-2xl font-bold mb-6 text-slate-400">Fail To Achieve</h3>
                        <h4 class="text-xl font-semibold mb-4 text-slate-400">Stay Stagnant</h4>
                        <p class="text-slate-400 mb-8">Follow the conventional route, investing years into a job you don't care about, for a boss you don't like, for a mediocre payment, just so you can retire in 50 years.</p>
                        <a href="https://www.jobs.com/" class="inline-block px-6 py-3 bg-slate-600 text-white rounded-full font-bold hover:bg-slate-700 transition">
                            Do It Their Way
                        </a>
                    </div>

                    <!-- Our Way -->
                    <div class="rounded-lg border-2 border-[#FFCF23] bg-gradient-to-br from-[#FFCF23]/10 to-[#FF8D3A]/10 backdrop-blur p-8 relative">
                        <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-[#FFCF23] to-[#FF8D3A] text-[#08070D] px-4 py-1 rounded-full text-sm font-bold">
                            RECOMMENDED
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Pay</h3>
                        <div class="text-5xl font-bold text-[#FFCF23] mb-4">$99</div>
                        <p class="text-slate-300 mb-8">Immediately tap into a reservoir of cutting-edge knowledge, positioning yourself at the vanguard of innovation and fast-tracking your path to wealth.</p>
                        <a href="{{ route('login') }}" class="inline-block w-full px-6 py-3 bg-gradient-to-r from-[#FFCF23] to-[#FF8D3A] text-[#08070D] rounded-full font-bold mb-6 hover:shadow-lg hover:shadow-[#FFCF23]/20 transition transform hover:scale-105">
                            Join The Real World
                        </a>
                        <div class="space-y-3 text-left">
                            <p class="text-slate-200 text-sm font-semibold">✅ Access to 12+ courses</p>
                            <p class="text-slate-200 text-sm font-semibold">✅ Daily mentorship sessions</p>
                            <p class="text-slate-200 text-sm font-semibold">✅ 155K+ community members</p>
                            <p class="text-slate-200 text-sm font-semibold">✅ Lifetime updates</p>
                            <p class="text-slate-200 text-sm font-semibold">✅ Cancel anytime</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto">
                <h2 class="text-4xl font-bold text-center mb-12">Frequently Asked Questions</h2>
                
                <div class="space-y-4">
                    @php
                        $faqs = [
                            [
                                'q' => 'How quickly will I make my money back?',
                                'a' => 'Many students make their money back in just a few weeks. It depends on how seriously you take it and how much you apply what you learn.'
                            ],
                            [
                                'q' => 'Do I need money to get started?',
                                'a' => 'Not necessarily. Many of our best students choose copywriting or freelancing, which require no startup capital.'
                            ],
                            [
                                'q' => 'Does my age matter?',
                                'a' => 'No. We have students ranging from 16 to 70+ years old. All are welcome.'
                            ],
                            [
                                'q' => 'I know nothing about these skills. Is it a problem?',
                                'a' => 'Not at all. This is a mentoring program. Just follow our step-by-step lessons and guidance.'
                            ],
                            [
                                'q' => 'I don\'t have much time. Can I still join?',
                                'a' => 'Yes. You only need 30 minutes a day to listen to lessons and apply what you learn.'
                            ],
                        ];
                    @endphp
                    
                    @foreach ($faqs as $faq)
                        <details class="group border border-white/10 rounded-lg overflow-hidden">
                            <summary class="flex cursor-pointer items-center justify-between bg-white/5 backdrop-blur p-6 hover:bg-white/10 transition">
                                <span class="font-semibold">{{ $faq['q'] }}</span>
                                <span class="ml-4 transform group-open:rotate-180 transition">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </summary>
                            <div class="px-6 pb-6 pt-0 text-slate-300">{{ $faq['a'] }}</div>
                        </details>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Final CTA -->
        <section class="py-20 px-4 sm:px-6 lg:px-8 text-center bg-gradient-to-r from-[#FFCF23]/10 to-[#FF8D3A]/10">
            <div class="max-w-2xl mx-auto">
                <h2 class="text-4xl font-bold mb-4">Ready to Transform Your Life?</h2>
                <p class="text-xl text-slate-300 mb-8">Lock in your price now before it increases. Join 155K+ students on their wealth journey.</p>
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-[#FFCF23] to-[#FF8D3A] text-[#08070D] rounded-full font-bold text-lg hover:shadow-lg hover:shadow-[#FFCF23]/20 transition transform hover:scale-105">
                    Start Free Trial Today
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </section>

        <!-- Footer -->
        <footer class="border-t border-white/10 bg-[#08070D] px-4 sm:px-6 lg:px-8 py-12">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                    <div>
                        <h3 class="font-bold mb-4">The Real World</h3>
                        <p class="text-slate-400 text-sm">The #1 platform for learning wealth creation skills.</p>
                    </div>
                    <div>
                        <h4 class="font-bold mb-4">Platform</h4>
                        <ul class="space-y-2 text-sm text-slate-400">
                            <li><a href="#courses" class="hover:text-[#FFCF23] transition">Courses</a></li>
                            <li><a href="#community" class="hover:text-[#FFCF23] transition">Community</a></li>
                            <li><a href="#pricing" class="hover:text-[#FFCF23] transition">Pricing</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold mb-4">Company</h4>
                        <ul class="space-y-2 text-sm text-slate-400">
                            <li><a href="#" class="hover:text-[#FFCF23] transition">About</a></li>
                            <li><a href="#" class="hover:text-[#FFCF23] transition">Blog</a></li>
                            <li><a href="#" class="hover:text-[#FFCF23] transition">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold mb-4">Legal</h4>
                        <ul class="space-y-2 text-sm text-slate-400">
                            <li><a href="{{route('privacy')}}" class="hover:text-[#FFCF23] transition">Privacy</a></li>
                            <li><a href="{{ route('terms') }}" class="hover:text-[#FFCF23] transition">Terms</a></li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-white/10 pt-8 text-center text-slate-400 text-sm">
                    <p>&copy; 2026 The Real World. All rights reserved. | Build real income, real freedom.</p>
                </div>
            </div>
        </footer>
    </body>
</html>
