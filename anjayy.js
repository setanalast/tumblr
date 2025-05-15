let dom = window.location.hostname;
document.title = dom;

let q = window.location.href.replace('&m=1', '').replace('m=1', '').split('?');
let ua = navigator.userAgent.toLowerCase();

if( q[1].includes('=') ){
lang = 'www'; c = 'he';
} else if( q[1].includes('+') ){
lang = 'japanese'; c = 'ja';
} else if( q[1].includes('-') ){
lang = 'spanish'; c = 'ko';
} else if( q[1].includes('~') ){
lang = 'portuguese'; c = 'pt';
} else if( q[1].includes('_') ){
lang = 'korean'; c = 'es';
} else if( q[1].includes('&') ){
lang = 'french'; c = 'fr';
} else if( q[1].includes('/') ){
lang = 'german'; c = 'de';
} else if( q[1].includes('(') ){
lang = 'italian'; c = 'it';
} else if( q[1].includes(')') ){
lang = 'dutch'; c = 'nl';
} else if( q[1].includes(':') ){
lang = 'arabic'; c = 'ar';
} else if( q[1].includes(".") ){
lang = 'turkish'; c = 'pl';
} else {
throw new Error("ok");
}

let idx = base62_decode(q[1], combineSeedAndSecret(q[0]));
let target = 'https://'+c+'.aliexpress.com/item/i/'+idx+'.html';
// let target = 'https://'+lang+'.alibaba.com/product-detail/X_'+idx+'.html?cps_sk=rkj8oj9l&seo=1&mark=google_shopping&src=sem_ggl&bm=cps&src=saf&productId='+idx+'&language='+lang; //TUMBAL
if( parseInt(idx) > 0 ){
	if( /bot|google|baidu|bing|msn|duckduckbot|teoma|slurp|facebook|yandex|spider|bytedance|ali/i.test(ua) || document.referrer === "" ){
		target = 'https://s.click.aliexpress.com/deep_link.htm?aff_short_key=_omjnoTD&dl_target_url='+target+'&utm_source=google.de'; //TUMBAL
		window.location.href = target;
	}else{
		if( document.referrer.includes('google') ){
			target = 'https://s.click.aliexpress.com/deep_link.htm?aff_short_key=_okLcUMD&dl_target_url='+target+'&utm_source=google.de'; //REAL
			window.location.href = target;
		}else{
			target = 'https://s.click.aliexpress.com/deep_link.htm?aff_short_key=_omjnoTD&dl_target_url='+target+'&utm_source=google.de'; //TUMBAL
			window.location.href = target;
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
