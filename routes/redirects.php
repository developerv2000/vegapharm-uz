<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Redirect old website routes to new site routes
|--------------------------------------------------------------------------
|
*/

Route::redirect('/contacts', '/#our-presence');
Route::redirect('/mission', '/#about-us');
Route::redirect('/about_us', '/#about-us');
Route::redirect('/carrier', '/#career');
Route::redirect('/category/{category}', '/products');

Route::redirect('/uz/contacts', '/uz/#our-presence');
Route::redirect('/uz/mission', '/uz/#about-us');
Route::redirect('/uz/about_us', '/uz/#about-us');
Route::redirect('/uz/carrier', '/uz/#career');
Route::redirect('/uz/category/{category}', '/uz/products');

Route::redirect('/atsemagnil', '/products');
Route::redirect('/pardifen', '/products/pardifen');
Route::redirect('/donezil', '/products/donezil');
Route::redirect('/kortipan', '/products');
Route::redirect('/ramkatsin', '/products/ramkatsin');
Route::redirect('/tserebral', '/products/tserebral');
Route::redirect('/biomeksin', '/products');
Route::redirect('/levoyaps', '/products/levoyaps');
Route::redirect('/rozaket', '/products');
Route::redirect('/restator', '/products/restator');
Route::redirect('/timolens', '/products');
Route::redirect('/setimed', '/products/setimed');
Route::redirect('/zhasmed', '/products/zhasmed');
Route::redirect('/velodep', '/products/velodep');
Route::redirect('/tselevo', '/products/tselevo');
Route::redirect('/kontrimin', '/products/kontrimin');
Route::redirect('/fobos', '/products/fobos');
Route::redirect('/terikvin', '/products/terikvin');
Route::redirect('/kaltsinorm', '/products');
Route::redirect('/tvardoks', '/products/tvardoks');
Route::redirect('/bromesol', '/products');
Route::redirect('/memibel', '/products');
Route::redirect('/rinaler', '/products/rinaler');
Route::redirect('/lambene', '/products/lambene');
Route::redirect('/reepitol', '/products/reepitol');
Route::redirect('/vilgalin', '/products/vilgalin');
Route::redirect('/belazidim', '/products');
Route::redirect('/urolekt', '/products/urolekt');
Route::redirect('/entselad', '/products/entselad');
Route::redirect('/lindafer', '/products/lindafer');
Route::redirect('/tadreta', '/products');
Route::redirect('/allergastin', '/products/allergastin');
Route::redirect('/belatsef', '/products/belatsef');
Route::redirect('/filarmeks', '/products/filarmeks');
Route::redirect('/geptolekt', '/products/geptolekt');
Route::redirect('/tamekraz', '/products/tamekraz');
Route::redirect('/vegtazon', '/products/vegtazon');
Route::redirect('/revianoks', '/products');
Route::redirect('/glatanost', '/products/glatanost');
Route::redirect('/reklin', '/products/reklin');
Route::redirect('/bejbikol', '/products');
Route::redirect('/ajlinda', '/products');
Route::redirect('/belandzh', '/products/belandzh');
Route::redirect('/novosalik', '/products/novosalik');
Route::redirect('/allerajz', '/products/allerayz');
Route::redirect('/kokarbens', '/products/kokarbens');
Route::redirect('/emeron', '/products/emeron');
Route::redirect('/vegaderm', '/products/vegaderm');
Route::redirect('/lambrotin', '/products/lambrotin');
Route::redirect('/livertin', '/products/livertin');
Route::redirect('/travolajf', '/products');
Route::redirect('/sonvel', '/products');
Route::redirect('/lamberg', '/products');
Route::redirect('/revard', '/products');
Route::redirect('/lambrotin-sirop', '/products/lambrotin-sirop');
Route::redirect('/pardifen-kids', '/products/pardifen-kids');
Route::redirect('/meldovens-maks', '/products');
Route::redirect('/verabez-2', '/products/verabez');
Route::redirect('/reklin-ampuly', '/products/reklin-ampuli');
Route::redirect('/viplaktin-bejbi', '/products/viplaktin-beybi');
Route::redirect('/ramkatsin-2', '/products/ramkatsin');
Route::redirect('/setimed-sirop', '/products/setimed-sirop');
Route::redirect('/glatanost-t', '/products/glatanost-t');
Route::redirect('/belatirs-sprej', '/products/belatirs-sprey');
Route::redirect('/emeron-gel', '/products/emeron-gely');
Route::redirect('/toedin-gino', '/products');
Route::redirect('/tvardoks-n', '/products/tvardoks-n');
Route::redirect('/emeron-2', '/products/emeron-1');
Route::redirect('/viplaktin-amino', '/products/viplaktin-amino');
Route::redirect('/viplaktin-c', '/products/viplaktin-s');
Route::redirect('/belatirs-intensiv', '/products/belatirs-intensiv');
Route::redirect('/memibel-l', '/products');
Route::redirect('/pardifen-aktiv', '/products/pardifen-aktiv');
Route::redirect('/kategor-ofta', '/products/kategor-ofta');
Route::redirect('/levoyaps-pro', '/products/levoyaps-pro');
Route::redirect('/meldovens-maks-ampula', '/products/meldovens-maks-ampula');
Route::redirect('/neo-vites-ot-zaporov', '/products');
Route::redirect('/neo-vites-dlya-appetita', '/products');
Route::redirect('/neo-vites-spokojnyj-son', '/products');
Route::redirect('/reklin-2', '/products/reklin');
Route::redirect('/metrovens-gino', '/products');

Route::redirect('/uz/meldovens-maks-ampula', '/uz/products/meldovens-maks-ampula');
Route::redirect('/uz/neo-vites-dlya-appetita', '/uz/products');
Route::redirect('/uz/neo-vites-ot-zaporov', '/uz/products');
Route::redirect('/uz/viplaktin-c', '/uz/products/viplaktin-s');
Route::redirect('/uz/emeron-2', '/uz/products/emeron-1');
Route::redirect('/uz/viplaktin-bejbi', '/uz/products/viplaktin-beybi');
Route::redirect('/uz/setimed-sirop', '/uz/products/setimed-sirop');
Route::redirect('/uz/reklin-ampuly', '/uz/products/reklin-ampuli');
Route::redirect('/uz/lambrotin-sirop', '/uz/products/lambrotin-sirop');
Route::redirect('/uz/pardifen-kids', '/uz/products/pardifen-kids');
Route::redirect('/uz/tvardoks-n', '/uz/products/tvardoks-n');
Route::redirect('/uz/verabez-2', '/uz/products/verabez');
Route::redirect('/uz/livertin', '/uz/products/livertin');
Route::redirect('/uz/travolajf', '/uz/products');
Route::redirect('/uz/sonvel', '/uz/products');
Route::redirect('/uz/revard', '/uz/products');
Route::redirect('/uz/emeron', '/uz/products/emeron');
Route::redirect('/uz/vegtazon', '/uz/products/vegtazon');
Route::redirect('/uz/glatanost', '/uz/products/glatanost');
Route::redirect('/uz/vegaderm', '/uz/products/vegaderm');
Route::redirect('/uz/urolekt', '/uz/products/urolekt');
Route::redirect('/uz/kokarbens', '/uz/products/kokarbens');
Route::redirect('/uz/allergastin', '/uz/products/allergastin');
Route::redirect('/uz/belatsef', '/uz/products/belatsef');
Route::redirect('/uz/atsemagnil', '/uz/products');
Route::redirect('/uz/entselad', '/uz/products/entselad');
Route::redirect('/uz/zhasmed', '/uz/products/zhasmed');
Route::redirect('/uz/rozaket', '/uz/products');
Route::redirect('/uz/ramkatsin', '/uz/products/ramkatsin');
Route::redirect('/uz/pardifen', '/uz/products/pardifen');
Route::redirect('/uz/tadreta', '/uz/products');
Route::redirect('/uz/donezil', '/uz/products/donezil');
Route::redirect('/uz/bromesol', '/uz/products');
Route::redirect('/uz/restator', '/uz/products/restator');
Route::redirect('/uz/tamekraz', '/uz/products/tamekraz');
Route::redirect('/uz/levoyaps', '/uz/products/levoyaps');
Route::redirect('/uz/filarmeks', '/uz/products/filarmeks');
Route::redirect('/uz/bejbikol', '/uz/products');
Route::redirect('/uz/terikvin', '/uz/products/terikvin');
Route::redirect('/uz/belandzh', '/uz/products/belandzh');
Route::redirect('/uz/vilgalin', '/uz/products/vilgalin');
Route::redirect('/uz/reklin', '/uz/products/reklin');
Route::redirect('/uz/kaltsinorm', '/uz/products');
Route::redirect('/uz/fobos', '/uz/products/fobos');
Route::redirect('/uz/setimed', '/uz/products/setimed');
Route::redirect('/uz/tselevo', '/uz/products/tselevo');
Route::redirect('/uz/kontrimin', '/uz/products/kontrimin');
Route::redirect('/uz/belazidim', '/uz/products');
Route::redirect('/uz/our_values', '/uz');
Route::redirect('/uz/rinaler', '/uz/products/rinaler');
Route::redirect('/uz/timolens', '/uz/products');
Route::redirect('/uz/reepitol', '/uz/products/reepitol');
Route::redirect('/uz/tserebral', '/uz/products/tserebral');
Route::redirect('/uz/biomeksin', '/uz/products');
Route::redirect('/uz/lindafer', '/uz/products/lindafer');
Route::redirect('/uz/memibel', '/uz/products');
Route::redirect('/uz/kortipan', '/uz/products');
Route::redirect('/uz/geptolekt', '/uz/products/geptolekt');
Route::redirect('/uz/allerajz', '/uz/products/allerayz');
Route::redirect('/uz/novosalik', '/uz/products/novosalik');
Route::redirect('/uz/revianoks', '/uz/products');
Route::redirect('/uz/lambene', '/uz/products/lambene');
Route::redirect('/uz/velodep', '/uz/products/velodep');
Route::redirect('/uz/lambrotin', '/uz/products/lambrotin');
Route::redirect('/uz/ajlinda', '/uz/products');
Route::redirect('/uz/ramkatsin-2', '/uz/products/ramkatsin');
Route::redirect('/uz/glatanost-t', '/uz/products/glatanost-t');
Route::redirect('/uz/tselevo-2', '/uz/products/tselevo-1');
Route::redirect('/uz/belatirs-intensiv', '/uz/products/belatirs-intensiv');
Route::redirect('/uz/pardifen-aktiv', '/uz/products/pardifen-aktiv');
Route::redirect('/uz/memibel-l', '/uz/products');
Route::redirect('/uz/kategor-ofta', '/uz/products/kategor-ofta');
Route::redirect('/uz/toedin-gino', '/uz/products');
Route::redirect('/uz/belatirs-sprej', '/uz/products/belatirs-sprey');
Route::redirect('/uz/levoyaps-pro', '/uz/products/levoyaps-pro');
Route::redirect('/uz/emeron-gel', '/uz/products/emeron-gely');
Route::redirect('/uz/viplaktin-amino', '/uz/products/viplaktin-amino');
Route::redirect('/uz/category/library', '/uz');
Route::redirect('/uz/metrovens-gino', '/uz/products');
Route::redirect('/uz/reklin-2', '/uz/products/reklin');


Route::redirect('/wp-content/uploads/2017/02/VG_Vegaderm_Uz.pdf', '/instructions/vegaderm-uz.pdf');
Route::redirect('/wp-content/uploads/2018/12/SP_Funcid_Inf_200mg_Uz.pdf', '/uz/products');
Route::redirect('/wp-content/uploads/2018/12/BL_Levoyaps_Uz.pdf', '/instructions/levoyaps-uz.pdf');
Route::redirect('/wp-content/uploads/2018/12/SP_Parsolet_FCTab_Rus.pdf', '/uz/products');
Route::redirect('/wp-content/uploads/2019/09/BL_Memibel_Uz.pdf', '/uz/products');
Route::redirect('/wp-content/uploads/2021/04/Terikvin_Uz.pdf', '/instructions/terikvin-uz.pdf');
Route::redirect('/wp-content/uploads/2017/10/SP_Cvetox_FCTab_10mg_Rus.pdf', '/uz/products');
Route::redirect('/wp-content/uploads/2018/12/SP_Cefyaps.pdf', '/uz/products');
Route::redirect('/wp-content/uploads/2018/12/VG_Ramkacin_Rus.pdf', '/instructions/ramkatsin-ru.pdf');
Route::redirect('/wp-content/uploads/2021/04/Terikvin_Rus.pdf', '/instructions/terikvin-ru.pdf');
Route::redirect('/wp-content/uploads/2021/04/Fobos_caps_Uz.pdf', '/instructions/fobos-uz.pdf');
Route::redirect('/wp-content/uploads/2018/12/SP_Gervetin_Sol.pdf', '/products');
Route::redirect('/wp-content/uploads/2017/10/SP_Cvetox_FCTab_10mg_Uz.pdf', '/uz/products');
Route::redirect('/wp-content/uploads/2019/09/VG_VEGTASONE_Uz.pdf', '/instructions/vegtazon-uz.pdf');
Route::redirect('/wp-content/uploads/2017/10/SP_Omarens_T_Uz.pdf', '/uz/products');
Route::redirect('/wp-content/uploads/2019/09/SP_Vipson_Uz.pdf', '/uz/products');
Route::redirect('/wp-content/uploads/2023/05/Velodep_Inf_200ml_Uz.pdf', '/instructions/velodep-uz.pdf');
Route::redirect('/wp-content/uploads/2018/12/SP_Dometaxim_Rus.pdf', '/products');
Route::redirect('/wp-content/uploads/2018/12/BL_Lindafer_Uz.pdf', '/instructions/lindafer-uz.pdf');
Route::redirect('/wp-content/uploads/2017/10/SP_Karnilev_inj_PIL_Uz.pdf', '/uz/products');
Route::redirect('/wp-content/uploads/2018/12/BL_Lindafer_Inj.pdf', '/instructions/lindafer-ru.pdf');
Route::redirect('/wp-content/uploads/2019/09/SP_Mexaj_Rus.pdf', '/products');
Route::redirect('/wp-content/uploads/2018/12/SP_Parsolet_FCTab.pdf', '/products');
Route::redirect('/wp-content/uploads/2017/10/PIL_InforinActive_Gel_RusUz_Antibiotic.pdf', '/products');
Route::redirect('/wp-content/uploads/2018/12/BL_Belacef_Powd_Uz.pdf', '/instructions/belacef-uz.pdf');
Route::redirect('/wp-content/uploads/2019/09/VG_Lambene_Inj_Uz.pdf', '/instructions/lambene-uz.pdf');
Route::redirect('/wp-content/uploads/2019/09/BL_Viplactinbaby_sachet_Rus.pdf', '/instructions/viplaktin-beybi-ru.pdf');
Route::redirect('/wp-content/uploads/2017/10/SP_Slideron_tab_Uz.pdf', '/products');
Route::redirect('/wp-content/uploads/2018/12/VG_Encelad.pdf', '/instructions/entselad-ru.pdf');
Route::redirect('/wp-content/uploads/2017/02/VG_Vegaderm_Oint_15g_PIL_Antibiotic_Rus.pdf', '/instructions/vegaderm-ru.pdf');
Route::redirect('/wp-content/uploads/2018/12/SP_Polveren_PowSusp.pdf', '/products');
Route::redirect('/wp-content/uploads/2017/10/SP_Regimed_Inj_Rus.pdf', '/products');
Route::redirect('/wp-content/uploads/2018/12/VG_Verabez_Inj_Uz.pdf', '/instructions/verabez-uz.pdf');
Route::redirect('/wp-content/uploads/2018/12/BL_Belacef_Uz.pdf', '/instructions/belacef-uz.pdf');
Route::redirect('/wp-content/uploads/2018/12/SP_Avtoriya_Tb_Uz.pdf', '/uz/products');
Route::redirect('/wp-content/uploads/2021/04/Emeron_Gel_Rus.pdf', '/instructions/emeron-gely-ru.pdf');
Route::redirect('/wp-content/uploads/2018/12/VG_Verabez_Uz.pdf', '/instructions/verabez-uz.pdf');
Route::redirect('/wp-content/uploads/2018/12/VG_Ramkacin_Vial_Uz.pdf', '/uz/products');
Route::redirect('/wp-content/uploads/2018/12/SP_Funcid.pdf', '/products');
Route::redirect('/wp-content/uploads/2019/09/BL_Zhasmed_tb_Uz.pdf', '/instructions/zhasmed-uz.pdf');
Route::redirect('/wp-content/uploads/2023/09/BL_Vilgalin_Tb_50mg_UzRus_Ins_Exemed_U01.pdf', '/instructions/vilgalin-ru.pdf');
Route::redirect('/wp-content/uploads/2018/12/SP_Galeks_Drops.pdf', '/uz/products');
Route::redirect('/wp-content/uploads/2018/12/VG_EMERON_Tab_100mg_Rus.pdf', '/instructions/emeron-1-ru.pdf');
Route::redirect('/wp-content/uploads/2021/04/Rozaket_Inj_30mg_Rus.pdf', '/products');
Route::redirect('/wp-content/uploads/2018/12/BL_Lindafer_Inj_Uz.pdf', '/instructions/lindafer-uz.pdf');
Route::redirect('/wp-content/uploads/2019/09/BL_Zhasmed_tb_Rus.pdf', '/instructions/zhasmed-ru.pdf');
Route::redirect('/wp-content/uploads/2018/12/SP_Karnilev_sol.pdf', '/products');
Route::redirect('/wp-content/uploads/2018/12/VG_Verabez_Rus.pdf', '/instructions/verabez-uz.pdf');
Route::redirect('/wp-content/uploads/2021/04/Setimed_tb_ins_rus.pdf', '/instructions/setimed-ru.pdf');
Route::redirect('/wp-content/uploads/2019/09/BL_Filarmex_Rus.pdf', '/instructions/filarmeks-ru.pdf');
Route::redirect('/wp-content/uploads/2021/04/Revianox_vial_20mg_Uz.pdf', '/uz/products');
Route::redirect('/wp-content/uploads/2018/12/SP_Cefyaps_Uz.pdf', '/uz/products');
Route::redirect('/wp-content/uploads/2021/04/Calsinorm_susp_150ml_Rus.pdf', '/products');
Route::redirect('/wp-content/uploads/2019/09/VG_Geptolect_Rus.pdf', '/instructions/geptolekt-ru.pdf');
Route::redirect('/wp-content/uploads/2021/04/Fobos_caps_Rus.pdf', '/instructions/fobos-ru.pdf');
Route::redirect('/wp-content/uploads/2018/12/BL_Belacef_Powd.pdf', '/instructions/belacef-ru.pdf');
Route::redirect('/wp-content/uploads/2018/12/VG_Encelad_Rus.pdf', '/instructions/entselad-ru.pdf');
Route::redirect('/wp-content/uploads/2019/09/VG_Lambene_Inj_Rus.pdf', '/instructions/lambene-ru.pdf');
Route::redirect('/wp-content/uploads/2017/10/SP_Cvetox_FCTab_10mg_RusUz_PIL_Replek_UZ_curved.pdf', '/uz/products');
Route::redirect('/wp-content/uploads/2021/04/Setimed_Syrup_50ml_Uz.pdf', '/instructions/setimed-sirop-uz.pdf');
Route::redirect('/wp-content/uploads/2017/02/PIL_NOVOSALIC_Oint_30g_Rus.pdf', '/instructions/novosalik-ru.pdf');
Route::redirect('/wp-content/uploads/2021/04/Allereyes_Drops_Uz.pdf', '/instructions/allerayz-uz.pdf');
Route::redirect('/wp-content/uploads/2018/12/VG_Celevo_tb_Rus.pdf', '/instructions/tselevo-ru.pdf');
Route::redirect('/wp-content/uploads/2018/12/SP_Sefyaps_Uz.pdf', '/uz/products');
Route::redirect('/wp-content/uploads/2021/04/Urolect_Sachets_Uz.pdf', '/instructions/urolekt-uz.pdf');
Route::redirect('/wp-content/uploads/2018/12/BL_Aylinda_Drops.pdf', '/products');
Route::redirect('/wp-content/uploads/2019/09/BL_Viplactinbaby_sachet_Uz.pdf', '/instructions/viplaktin-beybi-uz.pdf');
