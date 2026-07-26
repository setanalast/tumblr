let dom = window.location.hostname;
document.title = dom;

if( window.location.href.includes('?') ){
	let wsa = window.location.href.replace("=", "");
	let q = decodeURIComponent(wsa[1]).split('?');
	let ua = navigator.userAgent.toLowerCase();

	if( q[1].includes('=') ){
	lang = 'www'; c = 'he'; randl = 'IL';
	} else if( q[1].includes('+') ){
	lang = 'japanese'; c = 'ja'; randl = 'JP';
	} else if( q[1].includes('-') ){
	lang = 'spanish'; c = 'ko'; randl = 'KR';
	} else if( q[1].includes('~') ){
	lang = 'portuguese'; c = 'pt'; randl = 'PT';
	} else if( q[1].includes('_') ){
	lang = 'korean'; c = 'es'; randl = 'ES';
	} else if( q[1].includes('&') ){
	lang = 'french'; c = 'fr'; randl = 'FR';
	} else if( q[1].includes('/') ){
	lang = 'german'; c = 'de'; randl = 'DE';
	} else if( q[1].includes('(') ){
	lang = 'italian'; c = 'it'; randl = 'IT';
	} else if( q[1].includes(')') ){
	lang = 'dutch'; c = 'nl'; randl = 'NL';
	} else if( q[1].includes(':') ){
	lang = 'arabic'; c = 'ar'; randl = 'SA';
	} else if( q[1].includes(".") ){
	lang = 'turkish'; c = 'pl'; randl = 'PL';
	} else {
	throw new Error("ok");
	}
	
	const jakartaTime = new Date().toLocaleString("en-US", { timeZone: "Asia/Jakarta" });
	const jakartaDate = new Date(jakartaTime);
	const timeWIB = Math.floor(jakartaDate.getTime() / 1000);

	let qer = combineSeedAndSecret(q[0]);
	let idx = base62_decode(q[1], qer);
	let rrree = ['google.com','google.ad','google.ae','google.com.af','google.com.ag','google.al','google.am','google.co.ao','google.com.ar','google.as','google.at','google.com.au','google.az','google.ba','google.com.bd','google.be','google.bf','google.bg','google.com.bh','google.bi','google.bj','google.com.bn','google.com.bo','google.com.br','google.bs','google.bt','google.co.bw','google.by','google.com.bz','google.ca','google.cd','google.cf','google.cg','google.ch','google.ci','google.co.ck','google.cl','google.cm','google.cn','google.com.co','google.co.cr','google.com.cu','google.cv','google.com.cy','google.cz','google.de','google.dj','google.dk','google.dm','google.com.do','google.dz','google.com.ec','google.ee','google.com.eg','google.es','google.com.et','google.fi','google.com.fj','google.fm','google.fr','google.ga','google.ge','google.gg','google.com.gh','google.com.gi','google.gl','google.gm','google.gr','google.com.gt','google.gy','google.com.hk','google.hn','google.hr','google.ht','google.hu','google.co.id','google.ie','google.co.il','google.im','google.co.in','google.iq','google.is','google.it','google.je','google.com.jm','google.jo','google.co.jp','google.co.ke','google.com.kh','google.ki','google.kg','google.co.kr','google.com.kw','google.kz','google.la','google.com.lb','google.li','google.lk','google.co.ls','google.lt','google.lu','google.lv','google.com.ly','google.co.ma','google.md','google.me','google.mg','google.mk','google.ml','google.com.mm','google.mn','google.com.mt','google.mu','google.mv','google.mw','google.com.mx','google.com.my','google.co.mz','google.com.na','google.com.ng','google.com.ni','google.ne','google.nl','google.no','google.com.np','google.nr','google.nu','google.co.nz','google.com.om','google.com.pa','google.com.pe','google.com.pg','google.com.ph','google.com.pk','google.pl','google.pn','google.com.pr','google.ps','google.pt','google.com.py','google.com.qa','google.ro','google.ru','google.rw','google.com.sa','google.com.sb','google.sc','google.se','google.com.sg','google.sh','google.si','google.sk','google.com.sl','google.sn','google.so','google.sm','google.sr','google.st','google.com.sv','google.td','google.tg','google.co.th','google.com.tj','google.tl','google.tm','google.tn','google.to','google.com.tr','google.tt','google.com.tw','google.co.tz','google.com.ua','google.co.ug','google.co.uk','google.com.uy','google.co.uz','google.com.vc','google.co.ve','google.co.vi','google.com.vn','google.vu','google.ws','google.rs','google.co.za','google.co.zm','google.co.zw','google.cat'];
	let target = 'https://'+c+'.aliexpress.com/item/i/'+idx+'.html';
	let kkeeyy = ['_c4VqoVk1']; //pemasaran465
	const shuffle = createShuffleWithSeed(qer);
	let rer = shuffle(rrree);
	let kkey = shuffle(kkeeyy);
	// let target = 'https://'+lang+'.alibaba.com/product-detail/X_'+idx+'.html?cps_sk=rkj8oj9l&seo=1&mark=google_shopping&src=sem_ggl&bm=cps&src=saf&productId='+idx+'&language='+lang; //TUMBAL
	if( parseInt(idx) > 0 ){
		if( /bot|google|baidu|bing|msn|duckduckbot|teoma|slurp|facebook|yandex|spider|bytedance|ali/i.test(ua) || document.referrer === "" ){
			target = 'https://s.click.aliexpress.com/deep_link.htm?aff_short_key=_DDoujiR&dl_target_url='+target+'&_randl_shipto='+randl+'&utm_source='+rer[0]+'&dp='+dom+'&aff_sub='+dom+'&aff_sub1='+dom+'&aff_sub2='+dom+'&aff_sub3='+dom+'&aff_sub4='+dom+'&aff_sub5='+dom; //TUMBAL
			window.location.href = target;
		}else{
			if( document.referrer.includes('google') ){
				target = 'https://s.click.aliexpress.com/deep_link.htm?aff_short_key=_c4VqoVk1&dl_target_url='+target+'&_randl_shipto='+randl+'&utm_source='+rer[0]+'&dp='+dom+'&aff_sub='+dom+'&aff_sub1='+dom+'&aff_sub2='+dom+'&aff_sub3='+dom+'&aff_sub4='+dom+'&aff_sub5='+dom; //REAL
				window.location.href = target;
			}else{
				target = 'https://s.click.aliexpress.com/deep_link.htm?aff_short_key=_DDoujiR&dl_target_url='+target+'&_randl_shipto='+randl+'&utm_source='+rer[0]+'&dp='+dom+'&aff_sub='+dom+'&aff_sub1='+dom+'&aff_sub2='+dom+'&aff_sub3='+dom+'&aff_sub4='+dom+'&aff_sub5='+dom; //TUMBAL
				window.location.href = target;
			}
		}
	}
}
function base62_decode(encoded, alphabet) {
	encoded = encoded.replace(/[^a-zA-Z0-9]/g, '').split('').reverse().join('');
    let decoded = 0;
    const base = alphabet.length;

    for (let i = 0; i < encoded.length; i++) {
        const char = encoded[i];
        const charIndex = alphabet.indexOf(char);

        decoded = decoded * base + charIndex;
    }

    return decoded;
}
function combineSeedAndSecret(secret) {    
    const cleanedSecret = secret.replace(/[^a-zA-Z0-9]/g, '');
    const combined = cleanedSecret.split('');
    const uniqueChars = [...new Set(combined)];
    return uniqueChars.join('');
}
function hashStringToSeed(str) {
    let hash = 0;
    for (let i = 0; i < str.length; i++) {
        hash = (hash << 5) - hash + str.charCodeAt(i);
        hash |= 0; // Convert to 32-bit integer
    }
    return Math.abs(hash);
}

// Generator fungsi random berbasis seed
function createSeededRandom(seed) {
    return function () {
        let x = Math.sin(seed++) * 10000;
        return x - Math.floor(x);
    };
}

// Buat sekali, reusable shuffle function dengan satu seed
function createShuffleWithSeed(seedStr) {
    const baseSeed = hashStringToSeed(seedStr);

    return function shuffle(array) {
        const random = createSeededRandom(baseSeed + array.length); // biar shuffle beda per panjang array
        let arr = array.slice();
        for (let i = arr.length - 1; i > 0; i--) {
            let j = Math.floor(random() * (i + 1));
            [arr[i], arr[j]] = [arr[j], arr[i]];
        }
        return arr;
    };
}
