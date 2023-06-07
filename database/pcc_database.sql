-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 06, 2023 at 01:34 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcc_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `sample_data`
--

CREATE TABLE `sample_data` (
  `id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `age` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sample_data`
--

INSERT INTO `sample_data` (`id`, `first_name`, `last_name`, `age`) VALUES
(4, 'dfgdfgfd', 'gdfgdfg', 323),
(5, 'gfgdf', 'gfd', 2),
(6, 'hfghfg', 'fghfg21', 122);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcements`
--

CREATE TABLE `tbl_announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_announcements`
--

INSERT INTO `tbl_announcements` (`id`, `title`, `path`, `description`, `created_at`, `updated_at`) VALUES
(141, 'Sample ', 'uploads/announcement/68495.png', '<p>Sample</p>', '2023-04-17 10:18:37', '2023-04-24 09:25:11'),
(142, 'gfd', 'uploads/announcement/21975.png', '<p>gfdgdf</p>', '2023-04-17 10:19:30', '2023-04-24 09:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_setting`
--

CREATE TABLE `tbl_blog_setting` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `subtitle` varchar(250) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `instagram` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `youtube` varchar(50) NOT NULL,
  `footer` varchar(250) NOT NULL,
  `navbar_color` varchar(100) NOT NULL,
  `body_color` varchar(100) NOT NULL,
  `footer_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_blog_setting`
--

INSERT INTO `tbl_blog_setting` (`id`, `title`, `subtitle`, `facebook`, `instagram`, `twitter`, `youtube`, `footer`, `navbar_color`, `body_color`, `footer_color`) VALUES
(1, 'P C C     B L O G', '<strong>I</strong>nnovative • <strong>N</strong>ationalistic • <strong>A</strong>ffective', '1', '1', '1', '1', 'pcc.edu.com', '#524132', '#dad0c7', '#907358');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year_level` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`id`, `name`, `year_level`, `created_at`, `updated_at`) VALUES
(1, 'CLASS 1', 1, '2023-03-02 11:37:12', '2023-03-30 08:06:36'),
(3, 'CLASS 2', 2, '2023-03-30 07:51:52', '2023-03-30 08:22:53'),
(4, 'CLASS 3', 3, '2023-03-30 08:07:35', '2023-03-30 08:22:56'),
(5, 'CLASS 4', 4, '2023-03-30 08:23:05', '2023-03-30 14:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment_filter_dict`
--

CREATE TABLE `tbl_comment_filter_dict` (
  `id` int(11) NOT NULL,
  `word` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_comment_filter_dict`
--

INSERT INTO `tbl_comment_filter_dict` (`id`, `word`, `created_at`, `updated_at`) VALUES
(25, '2 girls 1 cup,2g1c,4r5e,5h1t,5hit,a_s_s,a55,acrotomophilia,alabama hot pocket,alaskan pipeline,anal,anilingus,anus,apeshit,ar5e,arrse,arse,arsehole,ass,ass-fucker,ass-hat,ass-jabber,ass-pirate,assbag,assbandit,assbanger,assbite,assclown,asscock,asscracker,asses,assface,assfuck,assfucker,assfukka,assgoblin,asshat,asshead,asshole,assholes,asshopper,assjacker,asslick,asslicker,assmonkey,assmunch,assmuncher,assnigger,asspirate,assshit,assshole,asssucker,asswad,asswhole,asswipe,auto erotic,autoerotic,axwound,b!tch,b00bs,b17ch,b1tch,babeland,baby batter,baby juice,ball gag,ball gravy,ball kicking,ball licking,ball sack,ball sucking,ballbag,balls,ballsack,bampot,bangbros,bareback,barely legal,barenaked,bastard,bastardo,bastinado,bbw,bdsm,beaner,beaners,beastial,beastiality,beaver cleaver,beaver lips,bellend,bestial,bestiality,bi+ch,biatch,big black,big breasts,big knockers,big tits,bimbos,birdlock,bitch,bitchass,bitcher,bitchers,bitches,bitchin,bitching,bitchtits,bitchy,black cock,blonde action,blonde on blonde action,bloody,blow job,blow your load,blowjob,blowjobs,blue waffle,blumpkin,boiolas,bollock,bollocks,bollok,bollox,bondage,boner,boob,boobs,booobs,boooobs,booooobs,booooooobs,booty call,breasts,breeder,brotherfucker,brown showers,brunette action,buceta,bugger,bukkake,bulldyke,bullet vibe,bullshit,bum,bumblefuck,bung hole,bunghole,bunny fucker,busty,butt,butt plug,butt-pirate,buttcheeks,buttfucka,buttfucker,butthole,buttmuch,buttplug,c0ck,c0cksucker,camel toe,camgirl,camslut,camwhore,carpet muncher,carpetmuncher,cawk,chesticle,chinc,chink,choad,chocolate rosebuds,chode,cipa,circlejerk,cl1t,cleveland steamer,clit,clitface,clitfuck,clitoris,clits,clover clamps,clusterfuck,cnut,cock,cock-sucker,cockass,cockbite,cockburger,cockeye,cockface,cockfucker,cockhead,cockjockey,cockknoker,cocklump,cockmaster,cockmongler,cockmongruel,cockmonkey,cockmunch,cockmuncher,cocknose,cocknugget,cocks,cockshit,cocksmith,cocksmoke,cocksmoker,cocksniffer,cocksuck,cocksucked,cocksucker,cocksucking,cocksucks,cocksuka,cocksukka,cockwaffle,cok,cokmuncher,coksucka,coochie,coochy,coon,coons,cooter,coprolagnia,coprophilia,cornhole,cox,cracker,crap,creampie,crotte,cum,cumbubble,cumdumpster,cumguzzler,cumjockey,cummer,cumming,cums,cumshot,cumslut,cumtart,cunilingus,cunillingus,cunnie,cunnilingus,cunt,cuntass,cuntface,cunthole,cuntlick,cuntlicker,cuntlicking,cuntrag,cunts,cuntslut,cyalis,cyberfuc,cyberfuck,cyberfucked,cyberfucker,cyberfuckers,cyberfucking,d1ck,dago,damn,darkie,date rape,daterape,deep throat,deepthroat,deggo,dendrophilia,dick,dick-sneeze,dickbag,dickbeaters,dickface,dickfuck,dickfucker,dickhead,dickhole,dickjuice,dickmilk ,dickmonger,dicks,dickslap,dicksucker,dicksucking,dicktickler,dickwad,dickweasel,dickweed,dickwod,dike,dildo,dildos,dingleberries,dingleberry,dink,dinks,dipshit,dirsa,dirty pillows,dirty sanchez,dlck,dog style,dog-fucker,doggie style,doggiestyle,doggin,dogging,doggy style,doggystyle,dolcett,domination,dominatrix,dommes,donkey punch,donkeyribber,doochbag,dookie,doosh,double dong,double penetration,doublelift,douche,douche-fag,douchebag,douchewaffle,dp action,dry hump,duche,dumass,dumb ass,dumbass,dumbcunt,dumbfuck,dumbshit,dumshit,dvda,dyke,eat my ass,ecchi,ejaculate,ejaculated,ejaculates,ejaculating,ejaculatings,ejaculation,ejakulate,erotic,erotism,escort,eunuch,f u c k,f u c k e r,f_u_c_k,f4nny,fag,fagbag,fagfucker,fagging,faggit,faggitt,faggot,faggotcock,faggs,fagot,fagots,fags,fagtard,fanny,fannyflaps,fannyfucker,fanyy,fatass,fcuk,fcuker,fcuking,fecal,feck,fecker,felch,felching,fellate,fellatio,feltch,female squirting,femdom,figging,fingerbang,fingerfuck,fingerfucked,fingerfucker,fingerfuckers,fingerfucking,fingerfucks,fingering,fistfuck,fistfucked,fistfucker,fistfuckers,fistfucking,fistfuckings,fistfucks,fisting,flamer,flange,foah,fook,fooker,foot fetish,footjob,frotting,fuck,fuck buttons,fuck off,fucka,fuckass,fuckbag,fuckboy,fuckbrain,fuckbutt,fuckbutter,fucked,fucker,fuckers,fuckersucker,fuckface,fuckhead,fuckheads,fuckhole,fuckin,fucking,fuckings,fuckingshitmotherfucker,fuckme,fucknut,fucknutt,fuckoff,fucks,fuckstick,fucktard,fucktards,fucktart,fucktwat,fuckup,fuckwad,fuckwhit,fuckwit,fuckwitt,fudge packer,fudgepacker,fuk,fuker,fukker,fukkin,fuks,fukwhit,fukwit,futanari,fux,fux0r,g-spot,gang bang,gangbang,gangbanged,gangbangs,gay,gay sex,gayass,gaybob,gaydo,gayfuck,gayfuckist,gaylord,gaysex,gaytard,gaywad,genitals,giant cock,girl on,girl on top,girls gone wild,goatcx,goatse,god damn,god-dam,god-damned,goddamn,goddamned,goddamnit,gokkun,golden shower,goo girl,gooch,goodpoop,gook,goregasm,gringo,grope,group sex,guido,guro,hand job,handjob,hard core,hard on,hardcore,hardcoresex,heeb,hell,hentai,heshe,ho,hoar,hoare,hoe,hoer,homo,homodumbshit,homoerotic,honkey,hooker,hore,horniest,horny,hot carl,hot chick,hotsex,how to kill,how to murder,huge fat,humping,incest,intercourse,jack Off,jack-off,jackass,jackoff,jaggi,jagoff,jail bait,jailbait,jap,jelly donut,jerk off,jerk-off,jerkass,jigaboo,jiggaboo,jiggerboo,jism,jiz,jizm,jizz,juggs,jungle bunny,junglebunny,kawk,kike,kinbaku,kinkster,kinky,knob,knobbing,knobead,knobed,knobend,knobhead,knobjocky,knobjokey,kock,kondum,kondums,kooch,kootch,kraut,kum,kummer,kumming,kums,kunilingus,kunja,kunt,kyke,l3i+ch,l3itch,labia,lameass,lardass,leather restraint,leather straight jacket,lemon party,lesbian,lesbo,lezzie,lmfao,lolita,lovemaking,lust,lusting,m0f0,m0fo,m45terbate,ma5terb8,ma5terbate,make me come,male squirting,masochist,master-bate,masterb8,masterbat,masterbat3,masterbate,masterbation,masterbations,masturbate,mcfagget,menage a trois,mick,milf,minge,missionary position,mo-fo,mof0,mofo,mothafuck,mothafucka,mothafuckas,mothafuckaz,mothafucked,mothafucker,mothafuckers,mothafuckin,mothafucking,mothafuckings,mothafucks,mother fucker,motherfuck,motherfucked,motherfucker,motherfuckers,motherfuckin,motherfucking,motherfuckings,motherfuckka,motherfucks,mound of venus,mr hands,muff,muff diver,muffdiver,muffdiving,munging,mutha,muthafecker,muthafuckker,muther,mutherfucker,n1gga,n1gger,nambla,nawashi,nazi,negro,neonazi,nig nog,nigaboo,nigg3r,nigg4h,nigga,niggah,niggas,niggaz,nigger,niggers,niglet,nimphomania,nipple,nipples,nob,nob jokey,nobhead,nobjocky,nobjokey,nsfw images,nude,nudity,numbnuts,nut sack,nutsack,nympho,nymphomania,octopussy,omorashi,one cup two girls,one guy one jar,orgasim,orgasims,orgasm,orgasms,orgy,p0rn,paedophile,paki,panooch,panties,panty,pawn,pecker,peckerhead,pedobear,pedophile,pegging,penis,penisbanger,penisfucker,penispuffer,phone sex,phonesex,phuck,phuk,phuked,phuking,phukked,phukking,phuks,phuq,piece of shit,pigfucker,pimpis,piss,piss pig,pissed,pissed off,pisser,pissers,pisses,pissflaps,pissin,pissing,pissoff,pisspig,playboy,pleasure chest,pole smoker,polesmoker,pollock,ponyplay,poof,poon,poonani,poonany,poontang,poop,poop chute,poopchute,poopuncher,porch monkey,porchmonkey,porn,porno,pornography,pornos,prick,pricks,prince albert piercing,pron,pthc,pube,pubes,punanny,punany,punta,pusse,pussi,pussies,pussy,pussylicking,pussys,pust,puto,queaf,queef,queer,queerbait,queerhole,quim,raghead,raging boner,rape,raping,rapist,rectum,renob,retard,reverse cowgirl,rimjaw,rimjob,rimming,rosy palm,rosy palm and her 5 sisters,ruski,rusty trombone,s.o.b.,s&m,sadism,sadist,sand nigger,sandler,sandnigger,sanger,santorum,scat,schlong,scissoring,screwing,scroat,scrote,scrotum,seks,semen,sex,sexo,sexy,shag,shagger,shaggin,shagging,shaved beaver,shaved pussy,shemale,shi+,shibari,shit,shitass,shitbag,shitbagger,shitblimp,shitbrains,shitbreath,shitcanned,shitcunt,shitdick,shite,shited,shitey,shitface,shitfaced,shitfuck,shitfull,shithead,shithole,shithouse,shiting,shitings,shits,shitspitter,shitstain,shitted,shitter,shitters,shittiest,shitting,shittings,shitty,shiz,shiznit,shota,shrimping,skank,skeet,skullfuck,slag,slanteye,slut,slutbag,sluts,smeg,smegma,smut,snatch,snowballing,sodomize,sodomy,son-of-a-bitch,spac,spic,spick,splooge,splooge moose,spooge,spook,spread legs,spunk,strap on,strapon,strappado,strip club,style doggy,suck,suckass,sucks,suicide girls,sultry women,swastika,swinger,t1tt1e5,t1tties,tainted love,tard,taste my,tea bagging,teets,teez,testical,testicle,threesome,throating,thundercunt,tied up,tight white,tit,titfuck,tits,titt,tittie5,tittiefucker,titties,titty,tittyfuck,tittywank,titwank,tongue in a,topless,tosser,towelhead,tranny,tribadism,tub girl,tubgirl,turd,tushy,tw4t,twat,twathead,twatlips,twats,twatty,twatwaffle,twink,twinkie,two girls one cup,twunt,twunter,unclefucker,undressing,upskirt,urethra play,urophilia,v14gra,v1gra,va-j-j,vag,vagina,vajayjay,venus mound,viagra,vibrator,violet wand,vjayjay,vorarephilia,voyeur,vulva,w00se,wang,wank,wanker,wankjob,wanky,wet dream,wetback,white power,whoar,whore,whorebag,whoreface,willies,willy,wop,wrapping men,wrinkled starfish,xrated,xx,xxx,yaoi,yellow showers,yiffy,zoophilia,zubb,a$$,a$$hole,a55hole,ahole,anal impaler,anal leakage,analprobe,ass fuck,ass hole,assbang,assbanged,assbangs,assfaces,assh0le,beatch,bimbo,bitch tit,bitched,bloody hell,bootee,bootie,bull shit,bullshits,bullshitted,bullturds,bum boy,butt fuck,buttfuck,buttmunch,c-0-c-k,c-o-c-k,c-u-n-t,c.0.c.k,c.o.c.k.,c.u.n.t,caca,cacafuego,chi-chi man,child-fucker,clit licker,cock sucker,corksucker,corp whore,crackwhore,dammit,damned,damnit,darn,dick head,dick hole,dick shy,dick-ish,dickdipper,dickflipper,dickheads,dickish,f-u-c-k,f.u.c.k,fist fuck,fuck hole,fuck puppet,fuck trophy,fuck yo mama,fuck you,fuck-ass,fuck-bitch,fuck-tard,fuckedup,fuckmeat,fucknugget,fucktoy,fuq,gassy ass,h0m0,h0mo,ham flap,he-she,hircismus,holy shit,hom0,hoor,jackasses,jackhole,middle finger,moo foo,naked,p.u.s.s.y.,piss off,piss-off,rubbish,s-o-b,s0b,shit ass,shit fucker,shiteater,son of a bitch,son of a whore,two fingers,wh0re,wh0reface', '2023-02-25 18:08:49', '2023-02-25 18:08:49'),
(26, 'bopols', '2023-02-25 19:21:46', '2023-02-25 19:21:46'),
(27, 'tanga, hampaslupa, pataygutom, ulaga, hayop ka, tanga ka, tangahin, bobo, boboka, vb,bv,vuvu,vubo, vobu, tanginamo, tanginaka, tangnamo, namo, naka,inaka, inamo,napakatanga ', '2023-02-25 19:23:45', '2023-02-25 19:23:45'),
(28, 'tangahin', '2023-02-25 19:24:23', '2023-02-25 19:24:23'),
(29, 'tanga', '2023-02-25 19:29:38', '2023-02-25 19:29:38'),
(30, 'whore, bitch, b!tch, wh0re, wh0r3', '2023-02-25 19:30:44', '2023-02-25 19:30:44'),
(31, 'tangina, bobo', '2023-02-25 19:33:14', '2023-02-25 19:33:14'),
(32, '2 girls 1 cup\r\n2g1c\r\n4r5e\r\n5h1t\r\n5hit\r\na$$\r\na$$hole\r\na_s_s\r\na2m\r\na54\r\na55\r\na55hole\r\naeolus\r\nahole\r\nalabama hot pocket\r\nalaskan pipeline\r\nanal\r\nanal impaler\r\nanal leakage\r\nanalannie\r\nanalprobe\r\nanalsex\r\nanilingus\r\nanus\r\napeshit\r\nar5e\r\nareola\r\nareole\r\narian\r\narrse\r\narse\r\narsehole\r\naryan\r\nass\r\nass fuck\r\nass hole\r\nassault\r\nassbag\r\nassbagger\r\nassbandit\r\nassbang\r\nassbanged\r\nassbanger\r\nassbangs\r\nassbite\r\nassblaster\r\nassclown\r\nasscock\r\nasscracker\r\nasses\r\nassface\r\nassfaces\r\nassfuck\r\nassfucker\r\nass-fucker\r\nassfukka\r\nassgoblin\r\nassh0le\r\nasshat\r\nass-hat\r\nasshead\r\nassho1e\r\nasshole\r\nassholes\r\nasshopper\r\nasshore\r\nass-jabber\r\nassjacker\r\nassjockey\r\nasskiss\r\nasskisser\r\nassklown\r\nasslick\r\nasslicker\r\nasslover\r\nassman\r\nassmaster\r\nassmonkey\r\nassmucus\r\nassmunch\r\nassmuncher\r\nassnigger\r\nasspacker\r\nasspirate\r\nass-pirate\r\nasspuppies\r\nassranger\r\nassshit\r\nassshole\r\nasssucker\r\nasswad\r\nasswhole\r\nasswhore\r\nasswipe\r\nasswipes\r\nauto erotic\r\nautoerotic\r\naxwound\r\nazazel\r\nazz\r\nb!tch\r\nb00bs\r\nb17ch\r\nb1tch\r\nbabe\r\nbabeland\r\nbabes\r\nbaby batter\r\nbaby juice\r\nbadfuck\r\nball gag\r\nball gravy\r\nball kicking\r\nball licking\r\nball sack\r\nball sucking\r\nballbag\r\nballlicker\r\nballs\r\nballsack\r\nbampot\r\nbang\r\nbang (one\'s) box\r\nbangbros\r\nbanger\r\nbanging\r\nbareback\r\nbarely legal\r\nbarenaked\r\nbarf\r\nbarface\r\nbarfface\r\nbastard\r\nbastardo\r\nbastards\r\nbastinado\r\nbatty boy\r\nbawdy\r\nbazongas\r\nbazooms\r\nbbw\r\nbdsm\r\nbeaner\r\nbeaners\r\nbeardedclam\r\nbeastial\r\nbeastiality\r\nbeatch\r\nbeater\r\nbeatyourmeat\r\nbeaver\r\nbeaver cleaver\r\nbeaver lips\r\nbeef curtain\r\nbeef curtains\r\nbeer\r\nbeeyotch\r\nbellend\r\nbender\r\nbeotch\r\nbestial\r\nbestiality\r\nbi+ch\r\nbiatch\r\nbicurious\r\nbig black\r\nbig breasts\r\nbig knockers\r\nbig tits\r\nbigbastard\r\nbigbutt\r\nbigger\r\nbigtits\r\nbimbo\r\nbimbos\r\nbint\r\nbirdlock\r\nbisexual\r\nbi-sexual\r\nbitch\r\nbitch tit\r\nbitchass\r\nbitched\r\nbitcher\r\nbitchers\r\nbitches\r\nbitchez\r\nbitchin\r\nbitching\r\nbitchtits\r\nbitchy\r\nblack cock\r\nblonde action\r\nblonde on blonde action\r\nbloodclaat\r\nbloody\r\nbloody hell\r\nblow\r\nblow job\r\nblow me\r\nblow mud\r\nblow your load\r\nblowjob\r\nblowjobs\r\nblue waffle\r\nblumpkin\r\nboang\r\nbod\r\nbodily\r\nbogan\r\nbohunk\r\nboink\r\nboiolas\r\nbollick\r\nbollock\r\nbollocks\r\nbollok\r\nbollox\r\nbomd\r\nbondage\r\nbone\r\nboned\r\nboner\r\nboners\r\nbong\r\nboob\r\nboobies\r\nboobs\r\nbooby\r\nbooger\r\nbookie\r\nboong\r\nboonga\r\nbooobs\r\nboooobs\r\nbooooobs\r\nbooooooobs\r\nbootee\r\nbootie\r\nbooty\r\nbooty call\r\nbooze\r\nboozer\r\nboozy\r\nbosom\r\nbosomy\r\nbowel\r\nbowels\r\nbra\r\nbrassiere\r\nbreast\r\nbreastjob\r\nbreastlover\r\nbreastman\r\nbreasts\r\nbreeder\r\nbrotherfucker\r\nbrown showers\r\nbrunette action\r\nbuceta\r\nbugger\r\nbuggered\r\nbuggery\r\nbukkake\r\nbull shit\r\nbullcrap\r\nbulldike\r\nbulldyke\r\nbullet vibe\r\nbullshit\r\nbullshits\r\nbullshitted\r\nbullturds\r\nbum\r\nbum boy\r\nbumblefuck\r\nbumclat\r\nbumfuck\r\nbummer\r\nbung\r\nbung hole\r\nbunga\r\nbunghole\r\nbunny fucker\r\nbust a load\r\nbusty\r\nbutchdike\r\nbutchdyke\r\nbutt\r\nbutt fuck\r\nbutt plug\r\nbuttbang\r\nbutt-bang\r\nbuttcheeks\r\nbuttface\r\nbuttfuck\r\nbutt-fuck\r\nbuttfucka\r\nbuttfucker\r\nbutt-fucker\r\nbutthead\r\nbutthole\r\nbuttman\r\nbuttmuch\r\nbuttmunch\r\nbuttmuncher\r\nbutt-pirate\r\nbuttplug\r\nc.0.c.k\r\nc.o.c.k.\r\nc.u.n.t\r\nc0ck\r\nc-0-c-k\r\nc0cksucker\r\ncaca\r\ncahone\r\ncamel toe\r\ncameltoe\r\ncamgirl\r\ncamslut\r\ncamwhore\r\ncarpet muncher\r\ncarpetmuncher\r\ncawk\r\ncervix\r\nchesticle\r\nchi-chi man\r\nchick with a dick\r\nchild-fucker\r\nchin\r\nchinc\r\nchincs\r\nchink\r\nchinky\r\nchoad\r\nchoade\r\nchoc ice\r\nchocolate rosebuds\r\nchode\r\nchodes\r\nchota bags\r\ncipa\r\ncirclejerk\r\ncl1t\r\ncleveland steamer\r\nclimax\r\nclit\r\nclit licker\r\nclitface\r\nclitfuck\r\nclitoris\r\nclitorus\r\nclits\r\nclitty\r\nclitty litter\r\nclogwog\r\nclover clamps\r\nclunge\r\nclusterfuck\r\ncnut\r\ncocain\r\ncocaine\r\ncock\r\nc-o-c-k\r\ncock pocket\r\ncock snot\r\ncock sucker\r\ncockass\r\ncockbite\r\ncockblock\r\ncockburger\r\ncockeye\r\ncockface\r\ncockfucker\r\ncockhead\r\ncockholster\r\ncockjockey\r\ncockknocker\r\ncockknoker\r\ncocklicker\r\ncocklover\r\ncocklump\r\ncockmaster\r\ncockmongler\r\ncockmongruel\r\ncockmonkey\r\ncockmunch\r\ncockmuncher\r\ncocknose\r\ncocknugget\r\ncocks\r\ncockshit\r\ncocksmith\r\ncocksmoke\r\ncocksmoker\r\ncocksniffer\r\ncocksucer\r\ncocksuck\r\ncocksuck \r\ncocksucked\r\ncocksucker\r\ncock-sucker\r\ncocksuckers\r\ncocksucking\r\ncocksucks\r\ncocksuka\r\ncocksukka\r\ncockwaffle\r\ncoffin dodger\r\ncoital\r\ncok\r\ncokmuncher\r\ncoksucka\r\ncommie\r\ncondom\r\ncoochie\r\ncoochy\r\ncoon\r\ncoonnass\r\ncoons\r\ncooter\r\ncop some wood\r\ncoprolagnia\r\ncoprophilia\r\ncorksucker\r\ncornhole\r\ncorp whore\r\ncox\r\ncrabs\r\ncrack\r\ncracker\r\ncrackwhore\r\ncrack-whore\r\ncrap\r\ncrappy\r\ncreampie\r\ncretin\r\ncrikey\r\ncripple\r\ncrotte\r\ncum\r\ncum chugger\r\ncum dumpster\r\ncum freak\r\ncum guzzler\r\ncumbubble\r\ncumdump\r\ncumdumpster\r\ncumguzzler\r\ncumjockey\r\ncummer\r\ncummin\r\ncumming\r\ncums\r\ncumshot\r\ncumshots\r\ncumslut\r\ncumstain\r\ncumtart\r\ncunilingus\r\ncunillingus\r\ncunn\r\ncunnie\r\ncunnilingus\r\ncunntt\r\ncunny\r\ncunt\r\nc-u-n-t\r\ncunt hair\r\ncuntass\r\ncuntbag\r\ncuntface\r\ncuntfuck\r\ncuntfucker\r\ncunthole\r\ncunthunter\r\ncuntlick\r\ncuntlick \r\ncuntlicker\r\ncuntlicker \r\ncuntlicking\r\ncuntrag\r\ncunts\r\ncuntsicle\r\ncuntslut\r\ncunt-struck\r\ncuntsucker\r\ncut rope\r\ncyalis\r\ncyberfuc\r\ncyberfuck\r\ncyberfucked\r\ncyberfucker\r\ncyberfuckers\r\ncyberfucking\r\ncybersex\r\nd0ng\r\nd0uch3\r\nd0uche\r\nd1ck\r\nd1ld0\r\nd1ldo\r\ndago\r\ndagos\r\ndammit\r\ndamn\r\ndamned\r\ndamnit\r\ndarkie\r\ndarn\r\ndate rape\r\ndaterape\r\ndawgie-style\r\ndeep throat\r\ndeepthroat\r\ndeggo\r\ndendrophilia\r\ndick\r\ndick head\r\ndick hole\r\ndick shy\r\ndickbag\r\ndickbeaters\r\ndickbrain\r\ndickdipper\r\ndickface\r\ndickflipper\r\ndickfuck\r\ndickfucker\r\ndickhead\r\ndickheads\r\ndickhole\r\ndickish\r\ndick-ish\r\ndickjuice\r\ndickmilk\r\ndickmonger\r\ndickripper\r\ndicks\r\ndicksipper\r\ndickslap\r\ndick-sneeze\r\ndicksucker\r\ndicksucking\r\ndicktickler\r\ndickwad\r\ndickweasel\r\ndickweed\r\ndickwhipper\r\ndickwod\r\ndickzipper\r\ndiddle\r\ndike\r\ndildo\r\ndildos\r\ndiligaf\r\ndillweed\r\ndimwit\r\ndingle\r\ndingleberries\r\ndingleberry\r\ndink\r\ndinks\r\ndipship\r\ndipshit\r\ndirsa\r\ndirty\r\ndirty pillows\r\ndirty sanchez\r\ndlck\r\ndog style\r\ndog-fucker\r\ndoggie style\r\ndoggiestyle\r\ndoggie-style\r\ndoggin\r\ndogging\r\ndoggy style\r\ndoggystyle\r\ndoggy-style\r\ndolcett\r\ndomination\r\ndominatrix\r\ndommes\r\ndong\r\ndonkey punch\r\ndonkeypunch\r\ndonkeyribber\r\ndoochbag\r\ndoofus\r\ndookie\r\ndoosh\r\ndopey\r\ndouble dong\r\ndouble penetration\r\ndoublelift\r\ndouch3\r\ndouche\r\ndouchebag\r\ndouchebags\r\ndouche-fag\r\ndouchewaffle\r\ndouchey\r\ndp action\r\ndrunk\r\ndry hump\r\nduche\r\ndumass\r\ndumb ass\r\ndumbass\r\ndumbasses\r\ndumbcunt\r\ndumbfuck\r\ndumbshit\r\ndummy\r\ndumshit\r\ndvda\r\ndyke\r\ndykes\r\neat a dick\r\neat hair pie\r\neat my ass\r\neatpussy\r\necchi\r\nejaculate\r\nejaculated\r\nejaculates\r\nejaculating\r\nejaculatings\r\nejaculation\r\nejakulate\r\nenlargement\r\nerect\r\nerection\r\nerotic\r\nerotism\r\nescort\r\nessohbee\r\neunuch\r\nextacy\r\nextasy\r\nf u c k\r\nf u c k e r\r\nf.u.c.k\r\nf_u_c_k\r\nf4nny\r\nfacefucker\r\nfacial\r\nfack\r\nfag\r\nfagbag\r\nfagfucker\r\nfagg\r\nfagged\r\nfagging\r\nfaggit\r\nfaggitt\r\nfaggot\r\nfaggotcock\r\nfaggots\r\nfaggs\r\nfagot\r\nfagots\r\nfags\r\nfagtard\r\nfaig\r\nfaigt\r\nfanny\r\nfannybandit\r\nfannyflaps\r\nfannyfucker\r\nfanyy\r\nfart\r\nfartknocker\r\nfastfuck\r\nfat\r\nfatass\r\nfatfuck\r\nfatfucker\r\nfcuk\r\nfcuker\r\nfcuking\r\nfecal\r\nfeck\r\nfecker\r\nfelch\r\nfelcher\r\nfelching\r\nfellate\r\nfellatio\r\nfeltch\r\nfeltcher\r\nfemale squirting\r\nfemdom\r\nfenian\r\nfigging\r\nfingerbang\r\nfingerfuck\r\nfingerfuck \r\nfingerfucked\r\nfingerfucker\r\nfingerfucker \r\nfingerfuckers\r\nfingerfucking\r\nfingerfucks\r\nfingering\r\nfist fuck\r\nfisted\r\nfistfuck\r\nfistfucked\r\nfistfucker\r\nfistfucker \r\nfistfuckers\r\nfistfucking\r\nfistfuckings\r\nfistfucks\r\nfisting\r\nfisty\r\nflamer\r\nflange\r\nflaps\r\nfleshflute\r\nflog the log\r\nfloozy\r\nfoad\r\nfoah\r\nfondle\r\nfoobar\r\nfook\r\nfooker\r\nfoot fetish\r\nfootfuck\r\nfootfucker\r\nfootjob\r\nfootlicker\r\nforeskin\r\nfreakfuck\r\nfreakyfucker\r\nfreefuck\r\nfreex\r\nfrigg\r\nfrigga\r\nfrotting\r\nfubar\r\nfuc\r\nfuck\r\nf-u-c-k\r\nfuck buttons\r\nfuck hole\r\nfuck off\r\nfuck puppet\r\nfuck trophy\r\nfuck yo mama\r\nfuck you\r\nfucka\r\nfuckass\r\nfuck-ass\r\nfuckbag\r\nfuck-bitch\r\nfuckboy\r\nfuckbrain\r\nfuckbutt\r\nfuckbutter\r\nfucked\r\nfuckedup\r\nfucker\r\nfuckers\r\nfuckersucker\r\nfuckface\r\nfuckfreak\r\nfuckhead\r\nfuckheads\r\nfuckher\r\nfuckhole\r\nfuckin\r\nfucking\r\nfuckingbitch\r\nfuckings\r\nfuckingshitmotherfucker\r\nfuckme\r\nfuckme \r\nfuckmeat\r\nfuckmehard\r\nfuckmonkey\r\nfucknugget\r\nfucknut\r\nfucknutt\r\nfuckoff\r\nfucks\r\nfuckstick\r\nfucktard\r\nfuck-tard\r\nfucktards\r\nfucktart\r\nfucktoy\r\nfucktwat\r\nfuckup\r\nfuckwad\r\nfuckwhit\r\nfuckwhore\r\nfuckwit\r\nfuckwitt\r\nfuckyou\r\nfudge packer\r\nfudgepacker\r\nfudge-packer\r\nfuk\r\nfuker\r\nfukker\r\nfukkers\r\nfukkin\r\nfuks\r\nfukwhit\r\nfukwit\r\nfuq\r\nfutanari\r\nfux\r\nfux0r\r\nfvck\r\nfxck\r\ngae\r\ngai\r\ngang bang\r\ngangbang\r\ngang-bang\r\ngangbanged\r\ngangbangs\r\nganja\r\ngash\r\ngassy ass\r\ngay sex\r\ngayass\r\ngaybob\r\ngaydo\r\ngayfuck\r\ngayfuckist\r\ngaylord\r\ngays\r\ngaysex\r\ngaytard\r\ngaywad\r\ngender bender\r\ngenitals\r\ngey\r\ngfy\r\nghay\r\nghey\r\ngiant cock\r\ngigolo\r\nginger\r\ngippo\r\ngirl on\r\ngirl on top\r\ngirls gone wild\r\ngit\r\nglans\r\ngoatcx\r\ngoatse\r\ngod damn\r\ngodamn\r\ngodamnit\r\ngoddam\r\ngod-dam\r\ngoddammit\r\ngoddamn\r\ngoddamned\r\ngod-damned\r\ngoddamnit\r\ngoddamnmuthafucker\r\ngodsdamn\r\ngokkun\r\ngolden shower\r\ngoldenshower\r\ngolliwog\r\ngonad\r\ngonads\r\ngonorrehea\r\ngoo girl\r\ngooch\r\ngoodpoop\r\ngook\r\ngooks\r\ngoregasm\r\ngotohell\r\ngringo\r\ngrope\r\ngroup sex\r\ngspot\r\ng-spot\r\ngtfo\r\nguido\r\nguro\r\nh0m0\r\nh0mo\r\nham flap\r\nhand job\r\nhandjob\r\nhard core\r\nhard on\r\nhardcore\r\nhardcoresex\r\nhe11\r\nheadfuck\r\nhebe\r\nheeb\r\nhell\r\nhemp\r\nhentai\r\nheroin\r\nherp\r\nherpes\r\nherpy\r\nheshe\r\nhe-she\r\nhitler\r\nhiv\r\nho\r\nhoar\r\nhoare\r\nhobag\r\nhoe\r\nhoer\r\nholy shit\r\nhom0\r\nhomey\r\nhomo\r\nhomodumbshit\r\nhomoerotic\r\nhomoey\r\nhonkey\r\nhonky\r\nhooch\r\nhookah\r\nhooker\r\nhoor\r\nhootch\r\nhooter\r\nhooters\r\nhore\r\nhorniest\r\nhorny\r\nhot carl\r\nhot chick\r\nhotpussy\r\nhotsex\r\nhow to kill\r\nhow to murdep\r\nhow to murder\r\nhuge fat\r\nhump\r\nhumped\r\nhumping\r\nhun\r\nhussy\r\nhymen\r\niap\r\niberian slap\r\ninbred\r\nincest\r\ninjun\r\nintercourse\r\nj3rk0ff\r\njack off\r\njackass\r\njackasses\r\njackhole\r\njackoff\r\njack-off\r\njaggi\r\njagoff\r\njail bait\r\njailbait\r\njap\r\njaps\r\njelly donut\r\njerk\r\njerk off\r\njerk0ff\r\njerkass\r\njerked\r\njerkoff\r\njerk-off\r\njigaboo\r\njiggaboo\r\njiggerboo\r\njism\r\njiz\r\njizm\r\njizz\r\njizzed\r\njock\r\njuggs\r\njungle bunny\r\njunglebunny\r\njunkie\r\njunky\r\nkafir\r\nkawk\r\nkike\r\nkikes\r\nkill\r\nkinbaku\r\nkinkster\r\nkinky\r\nkkk\r\nklan\r\nknob\r\nknob end\r\nknobbing\r\nknobead\r\nknobed\r\nknobend\r\nknobhead\r\nknobjocky\r\nknobjokey\r\nkock\r\nkondum\r\nkondums\r\nkooch\r\nkooches\r\nkootch\r\nkraut\r\nkum\r\nkummer\r\nkumming\r\nkums\r\nkunilingus\r\nkunja\r\nkunt\r\nkwif\r\nkyke\r\nl3i+ch\r\nl3itch\r\nlabia\r\nlameass\r\nlardass\r\nleather restraint\r\nleather straight jacket\r\nlech\r\nlemon party\r\nleper\r\nlesbian\r\nlesbians\r\nlesbo\r\nlesbos\r\nlez\r\nlezbian\r\nlezbians\r\nlezbo\r\nlezbos\r\nlezza\r\nlezzie\r\nlezzies\r\nlezzy\r\nlmao\r\nlmfao\r\nloin\r\nloins\r\nlolita\r\nlooney\r\nlovemaking\r\nlube\r\nlust\r\nlusting\r\nlusty\r\nm0f0\r\nm0fo\r\nm45terbate\r\nma5terb8\r\nma5terbate\r\nmafugly\r\nmake me come\r\nmale squirting\r\nmams\r\nmasochist\r\nmassa\r\nmasterb8\r\nmasterbat\r\nmasterbat3\r\nmasterbate\r\nmaster-bate\r\nmasterbating\r\nmasterbation\r\nmasterbations\r\nmasturbate\r\nmasturbating\r\nmasturbation\r\nmaxi\r\nmcfagget\r\nmenage a trois\r\nmenses\r\nmenstruate\r\nmenstruation\r\nmeth\r\nm-fucking\r\nmick\r\nmiddle finger\r\nmidget\r\nmilf\r\nminge\r\nminger\r\nmissionary position\r\nmof0\r\nmofo\r\nmo-fo\r\nmolest\r\nmong\r\nmoo moo foo foo\r\nmoolie\r\nmoron\r\nmothafuck\r\nmothafucka\r\nmothafuckas\r\nmothafuckaz\r\nmothafucked\r\nmothafucker\r\nmothafuckers\r\nmothafuckin\r\nmothafucking\r\nmothafuckings\r\nmothafucks\r\nmother fucker\r\nmotherfuck\r\nmotherfucka\r\nmotherfucked\r\nmotherfucker\r\nmotherfuckers\r\nmotherfuckin\r\nmotherfucking\r\nmotherfuckings\r\nmotherfuckka\r\nmotherfucks\r\nmound of venus\r\nmr hands\r\nmtherfucker\r\nmthrfucker\r\nmthrfucking\r\nmuff\r\nmuff diver\r\nmuff puff\r\nmuffdiver\r\nmuffdiving\r\nmunging\r\nmunter\r\nmurder\r\nmutha\r\nmuthafecker\r\nmuthafuckaz\r\nmuthafuckker\r\nmuther\r\nmutherfucker\r\nmutherfucking\r\nmuthrfucking\r\nn1gga\r\nn1gger\r\nnad\r\nnads\r\nnaked\r\nnambla\r\nnapalm\r\nnappy\r\nnawashi\r\nnazi\r\nnazism\r\nneed the dick\r\nnegro\r\nneonazi\r\nnig nog\r\nnigaboo\r\nnigg3r\r\nnigg4h\r\nnigga\r\nniggah\r\nniggas\r\nniggaz\r\nnigger\r\nniggers\r\nniggle\r\nniglet\r\nnig-nog\r\nnimphomania\r\nnimrod\r\nninny\r\nnipple\r\nnipples\r\nnob\r\nnob jokey\r\nnobhead\r\nnobjocky\r\nnobjokey\r\nnonce\r\nnooky\r\nnsfw images\r\nnude\r\nnudity\r\nnumbnuts\r\nnut butter\r\nnut sack\r\nnutsack\r\nnutter\r\nnympho\r\nnymphomania\r\noctopussy\r\nold bag\r\nomg\r\nomorashi\r\none cup two girls\r\none guy one jar\r\nopiate\r\nopium\r\noral\r\norally\r\norgan\r\norgasim\r\norgasims\r\norgasm\r\norgasmic\r\norgasms\r\norgies\r\norgy\r\novary\r\novum\r\novums\r\np.u.s.s.y.\r\np0rn\r\npaddy\r\npaedophile\r\npaki\r\npanooch\r\npansy\r\npantie\r\npanties\r\npanty\r\npastie\r\npasty\r\npawn\r\npcp\r\npecker\r\npeckerhead\r\npedo\r\npedobear\r\npedophile\r\npedophilia\r\npedophiliac\r\npee\r\npeepee\r\npegging\r\npenetrate\r\npenetration\r\npenial\r\npenile\r\npenis\r\npenisbanger\r\npenisfucker\r\npenispuffer\r\nperversion\r\npeyote\r\nphalli\r\nphallic\r\nphone sex\r\nphonesex\r\nphuck\r\nphuk\r\nphuked\r\nphuking\r\nphukked\r\nphukking\r\nphuks\r\nphuq\r\npiece of shit\r\npigfucker\r\npikey\r\npillowbiter\r\npimp\r\npimpis\r\npinko\r\npiss\r\npiss off\r\npiss pig\r\npissed\r\npissed off\r\npisser\r\npissers\r\npisses\r\npissflaps\r\npissin\r\npissing\r\npissoff\r\npiss-off\r\npisspig\r\nplayboy\r\npleasure chest\r\npms\r\npolack\r\npole smoker\r\npolesmoker\r\npollock\r\nponyplay\r\npoof\r\npoon\r\npoonani\r\npoonany\r\npoontang\r\npoop\r\npoop chute\r\npoopchute\r\npoopuncher\r\nporch monkey\r\nporchmonkey\r\nporn\r\nporno\r\npornography\r\npornos\r\npot\r\npotty\r\nprick\r\npricks\r\nprickteaser\r\nprig\r\nprince albert piercing\r\nprod\r\npron\r\nprostitute\r\nprude\r\npsycho\r\npthc\r\npube\r\npubes\r\npubic\r\npubis\r\npunani\r\npunanny\r\npunany\r\npunkass\r\npunky\r\npunta\r\npuss\r\npusse\r\npussi\r\npussies\r\npussy\r\npussy fart\r\npussy palace\r\npussylicking\r\npussypounder\r\npussys\r\npust\r\nputo\r\nqueaf\r\nqueef\r\nqueer\r\nqueerbait\r\nqueerhole\r\nqueero\r\nqueers\r\nquicky\r\nquim\r\nracy\r\nraghead\r\nraging boner\r\nrape\r\nraped\r\nraper\r\nrapey\r\nraping\r\nrapist\r\nraunch\r\nrectal\r\nrectum\r\nrectus\r\nreefer\r\nreetard\r\nreich\r\nrenob\r\nretard\r\nretarded\r\nreverse cowgirl\r\nrevue\r\nrimjaw\r\nrimjob\r\nrimming\r\nritard\r\nrosy palm\r\nrosy palm and her 5 sisters\r\nrtard\r\nr-tard\r\nrubbish\r\nrum\r\nrump\r\nrumprammer\r\nruski\r\nrusty trombone\r\ns hit\r\ns&m\r\ns.h.i.t.\r\ns.o.b.\r\ns_h_i_t\r\ns0b\r\nsadism\r\nsadist\r\nsambo\r\nsand nigger\r\nsandbar\r\nsandler\r\nsandnigger\r\nsanger\r\nsantorum\r\nsausage queen\r\nscag\r\nscantily\r\nscat\r\nschizo\r\nschlong\r\nscissoring\r\nscrew\r\nscrewed\r\nscrewing\r\nscroat\r\nscrog\r\nscrot\r\nscrote\r\nscrotum\r\nscrud\r\nscum\r\nseaman\r\nseamen\r\nseduce\r\nseks\r\nsemen\r\nsex\r\nsexo\r\nsexual\r\nsexy\r\nsh!+\r\nsh!t\r\nsh1t\r\ns-h-1-t\r\nshag\r\nshagger\r\nshaggin\r\nshagging\r\nshamedame\r\nshaved beaver\r\nshaved pussy\r\nshemale\r\nshi+\r\nshibari\r\nshirt lifter\r\nshit\r\ns-h-i-t\r\nshit ass\r\nshit fucker\r\nshitass\r\nshitbag\r\nshitbagger\r\nshitblimp\r\nshitbrains\r\nshitbreath\r\nshitcanned\r\nshitcunt\r\nshitdick\r\nshite\r\nshiteater\r\nshited\r\nshitey\r\nshitface\r\nshitfaced\r\nshitfuck\r\nshitfull\r\nshithead\r\nshitheads\r\nshithole\r\nshithouse\r\nshiting\r\nshitings\r\nshits\r\nshitspitter\r\nshitstain\r\nshitt\r\nshitted\r\nshitter\r\nshitters\r\nshittier\r\nshittiest\r\nshitting\r\nshittings\r\nshitty\r\nshiz\r\nshiznit\r\nshota\r\nshrimping\r\nsissy\r\nskag\r\nskank\r\nskeet\r\nskullfuck\r\nslag\r\nslanteye\r\nslave\r\nsleaze\r\nsleazy\r\nslope\r\nslut\r\nslut bucket\r\nslutbag\r\nslutdumper\r\nslutkiss\r\nsluts\r\nsmartass\r\nsmartasses\r\nsmeg\r\nsmegma\r\nsmut\r\nsmutty\r\nsnatch\r\nsniper\r\nsnowballing\r\nsnuff\r\ns-o-b\r\nsod off\r\nsodom\r\nsodomize\r\nsodomy\r\nson of a bitch\r\nson of a motherless goat\r\nson of a whore\r\nson-of-a-bitch\r\nsouse\r\nsoused\r\nspac\r\nspade\r\nsperm\r\nspic\r\nspick\r\nspik\r\nspiks\r\nsplooge\r\nsplooge moose\r\nspooge\r\nspook\r\nspread legs\r\nspunk\r\nsteamy\r\nstfu\r\nstiffy\r\nstoned\r\nstrap on\r\nstrapon\r\nstrappado\r\nstrip\r\nstrip club\r\nstroke\r\nstupid\r\nstyle doggy\r\nsuck\r\nsuckass\r\nsucked\r\nsucking\r\nsucks\r\nsuicide girls\r\nsultry women\r\nsumofabiatch\r\nswastika\r\nswinger\r\nt1t\r\nt1tt1e5\r\nt1tties\r\ntaff\r\ntaig\r\ntainted love\r\ntaking the piss\r\ntampon\r\ntard\r\ntart\r\ntaste my\r\ntawdry\r\ntea bagging\r\nteabagging\r\nteat\r\nteets\r\nteez\r\nterd\r\nteste\r\ntestee\r\ntestes\r\ntestical\r\ntesticle\r\ntestis\r\nthreesome\r\nthroating\r\nthrust\r\nthug\r\nthundercunt\r\ntied up\r\ntight white\r\ntinkle\r\ntit\r\ntit wank\r\ntitfuck\r\ntiti\r\ntities\r\ntits\r\ntitt\r\ntittie5\r\ntittiefucker\r\ntitties\r\ntitty\r\ntittyfuck\r\ntittyfucker\r\ntittywank\r\ntitwank\r\ntoke\r\ntongue in a\r\ntoots\r\ntopless\r\ntosser\r\ntowelhead\r\ntramp\r\ntranny\r\ntranssexual\r\ntrashy\r\ntribadism\r\ntrumped\r\ntub girl\r\ntubgirl\r\nturd\r\ntush\r\ntushy\r\ntw4t\r\ntwat\r\ntwathead\r\ntwatlips\r\ntwats\r\ntwatty\r\ntwatwaffle\r\ntwink\r\ntwinkie\r\ntwo fingers\r\ntwo fingers with tongue\r\ntwo girls one cup\r\ntwunt\r\ntwunter\r\nugly\r\nunclefucker\r\nundies\r\nundressing\r\nunwed\r\nupskirt\r\nurethra play\r\nurinal\r\nurine\r\nurophilia\r\nuterus\r\nuzi\r\nv14gra\r\nv1gra\r\nvag\r\nvagina\r\nvajayjay\r\nva-j-j\r\nvalium\r\nvenus mound\r\nveqtable\r\nviagra\r\nvibrator\r\nviolet wand\r\nvirgin\r\nvixen\r\nvjayjay\r\nvodka\r\nvomit\r\nvorarephilia\r\nvoyeur\r\nvulgar\r\nvulva\r\nw00se\r\nwad\r\nwang\r\nwank\r\nwanker\r\nwankjob\r\nwanky\r\nwazoo\r\nwedgie\r\nweed\r\nweenie\r\nweewee\r\nweiner\r\nweirdo\r\nwench\r\nwet dream\r\nwetback\r\nwh0re\r\nwh0reface\r\nwhite power\r\nwhitey\r\nwhiz\r\nwhoar\r\nwhoralicious\r\nwhore\r\nwhorealicious\r\nwhorebag\r\nwhored\r\nwhoreface\r\nwhorehopper\r\nwhorehouse\r\nwhores\r\nwhoring\r\nwigger\r\nwillies\r\nwilly\r\nwindow licker\r\nwiseass\r\nwiseasses\r\nwog\r\nwomb\r\nwoody\r\nwop\r\nwrapping men\r\nwrinkled starfish\r\nwtf\r\nxrated\r\nx-rated\r\nxx\r\nxxx\r\nyaoi\r\nyeasty\r\nyellow showers\r\nyid\r\nyiffy\r\nyobbo\r\nzoophile\r\nzoophilia\r\nzubb', '2023-02-25 19:50:33', '2023-02-25 19:50:33');
INSERT INTO `tbl_comment_filter_dict` (`id`, `word`, `created_at`, `updated_at`) VALUES
(33, '2 girls 1 cup,2g1c,4r5e,5h1t,5hit,a$$,a$$hole,a_s_s,a2m,a54,a55,a55hole,aeolus,ahole,alabama hot pocket,alaskan pipeline,anal,anal impaler,anal leakage,analannie,analprobe,analsex,anilingus,anus,apeshit,ar5e,areola,areole,arian,arrse,arse,arsehole,aryan,ass,ass fuck,ass hole,assault,assbag,assbagger,assbandit,assbang,assbanged,assbanger,assbangs,assbite,assblaster,assclown,asscock,asscracker,asses,assface,assfaces,assfuck,assfucker,ass-fucker,assfukka,assgoblin,assh0le,asshat,ass-hat,asshead,assho1e,asshole,assholes,asshopper,asshore,ass-jabber,assjacker,assjockey,asskiss,asskisser,assklown,asslick,asslicker,asslover,assman,assmaster,assmonkey,assmucus,assmunch,assmuncher,assnigger,asspacker,asspirate,ass-pirate,asspuppies,assranger,assshit,assshole,asssucker,asswad,asswhole,asswhore,asswipe,asswipes,auto erotic,autoerotic,axwound,azazel,azz,b!tch,b00bs,b17ch,b1tch,babe,babeland,babes,baby batter,baby juice,badfuck,ball gag,ball gravy,ball kicking,ball licking,ball sack,ball sucking,ballbag,balllicker,balls,ballsack,bampot,bang,bang (one\'s) box,bangbros,banger,banging,bareback,barely legal,barenaked,barf,barface,barfface,bastard,bastardo,bastards,bastinado,batty boy,bawdy,bazongas,bazooms,bbw,bdsm,beaner,beaners,beardedclam,beastial,beastiality,beatch,beater,beatyourmeat,beaver,beaver cleaver,beaver lips,beef curtain,beef curtains,beer,beeyotch,bellend,bender,beotch,bestial,bestiality,bi+ch,biatch,bicurious,big black,big breasts,big knockers,big tits,bigbastard,bigbutt,bigger,bigtits,bimbo,bimbos,bint,birdlock,bisexual,bi-sexual,bitch,bitch tit,bitchass,bitched,bitcher,bitchers,bitches,bitchez,bitchin,bitching,bitchtits,bitchy,black cock,blonde action,blonde on blonde action,bloodclaat,bloody,bloody hell,blow,blow job,blow me,blow mud,blow your load,blowjob,blowjobs,blue waffle,blumpkin,boang,bod,bodily,bogan,bohunk,boink,boiolas,bollick,bollock,bollocks,bollok,bollox,bomd,bondage,bone,boned,boner,boners,bong,boob,boobies,boobs,booby,booger,bookie,boong,boonga,booobs,boooobs,booooobs,booooooobs,bootee,bootie,booty,booty call,booze,boozer,boozy,bosom,bosomy,bowel,bowels,bra,brassiere,breast,breastjob,breastlover,breastman,breasts,breeder,brotherfucker,brown showers,brunette action,buceta,bugger,buggered,buggery,bukkake,bull shit,bullcrap,bulldike,bulldyke,bullet vibe,bullshit,bullshits,bullshitted,bullturds,bum,bum boy,bumblefuck,bumclat,bumfuck,bummer,bung,bung hole,bunga,bunghole,bunny fucker,bust a load,busty,butchdike,butchdyke,butt,butt fuck,butt plug,buttbang,butt-bang,buttcheeks,buttface,buttfuck,butt-fuck,buttfucka,buttfucker,butt-fucker,butthead,butthole,buttman,buttmuch,buttmunch,buttmuncher,butt-pirate,buttplug,c.0.c.k,c.o.c.k.,c.u.n.t,c0ck,c-0-c-k,c0cksucker,caca,cahone,camel toe,cameltoe,camgirl,camslut,camwhore,carpet muncher,carpetmuncher,cawk,cervix,chesticle,chi-chi man,chick with a dick,child-fucker,chin,chinc,chincs,chink,chinky,choad,choade,choc ice,chocolate rosebuds,chode,chodes,chota bags,cipa,circlejerk,cl1t,cleveland steamer,climax,clit,clit licker,clitface,clitfuck,clitoris,clitorus,clits,clitty,clitty litter,clogwog,clover clamps,clunge,clusterfuck,cnut,cocain,cocaine,cock,c-o-c-k,cock pocket,cock snot,cock sucker,cockass,cockbite,cockblock,cockburger,cockeye,cockface,cockfucker,cockhead,cockholster,cockjockey,cockknocker,cockknoker,cocklicker,cocklover,cocklump,cockmaster,cockmongler,cockmongruel,cockmonkey,cockmunch,cockmuncher,cocknose,cocknugget,cocks,cockshit,cocksmith,cocksmoke,cocksmoker,cocksniffer,cocksucer,cocksuck,cocksuck,cocksucked,cocksucker,cock-sucker,cocksuckers,cocksucking,cocksucks,cocksuka,cocksukka,cockwaffle,coffin dodger,coital,cok,cokmuncher,coksucka,commie,condom,coochie,coochy,coon,coonnass,coons,cooter,cop some wood,coprolagnia,coprophilia,corksucker,cornhole,corp whore,cox,crabs,crack,cracker,crackwhore,crack-whore,crap,crappy,creampie,cretin,crikey,cripple,crotte,cum,cum chugger,cum dumpster,cum freak,cum guzzler,cumbubble,cumdump,cumdumpster,cumguzzler,cumjockey,cummer,cummin,cumming,cums,cumshot,cumshots,cumslut,cumstain,cumtart,cunilingus,cunillingus,cunn,cunnie,cunnilingus,cunntt,cunny,cunt,c-u-n-t,cunt hair,cuntass,cuntbag,cuntface,cuntfuck,cuntfucker,cunthole,cunthunter,cuntlick,cuntlick,cuntlicker,cuntlicker,cuntlicking,cuntrag,cunts,cuntsicle,cuntslut,cunt-struck,cuntsucker,cut rope,cyalis,cyberfuc,cyberfuck,cyberfucked,cyberfucker,cyberfuckers,cyberfucking,cybersex,d0ng,d0uch3,d0uche,d1ck,d1ld0,d1ldo,dago,dagos,dammit,damn,damned,damnit,darkie,darn,date rape,daterape,dawgie-style,deep throat,deepthroat,deggo,dendrophilia,dick,dick head,dick hole,dick shy,dickbag,dickbeaters,dickbrain,dickdipper,dickface,dickflipper,dickfuck,dickfucker,dickhead,dickheads,dickhole,dickish,dick-ish,dickjuice,dickmilk,dickmonger,dickripper,dicks,dicksipper,dickslap,dick-sneeze,dicksucker,dicksucking,dicktickler,dickwad,dickweasel,dickweed,dickwhipper,dickwod,dickzipper,diddle,dike,dildo,dildos,diligaf,dillweed,dimwit,dingle,dingleberries,dingleberry,dink,dinks,dipship,dipshit,dirsa,dirty,dirty pillows,dirty sanchez,dlck,dog style,dog-fucker,doggie style,doggiestyle,doggie-style,doggin,dogging,doggy style,doggystyle,doggy-style,dolcett,domination,dominatrix,dommes,dong,donkey punch,donkeypunch,donkeyribber,doochbag,doofus,dookie,doosh,dopey,double dong,double penetration,doublelift,douch3,douche,douchebag,douchebags,douche-fag,douchewaffle,douchey,dp action,drunk,dry hump,duche,dumass,dumb ass,dumbass,dumbasses,dumbcunt,dumbfuck,dumbshit,dummy,dumshit,dvda,dyke,dykes,eat a dick,eat hair pie,eat my ass,eatpussy,ecchi,ejaculate,ejaculated,ejaculates,ejaculating,ejaculatings,ejaculation,ejakulate,enlargement,erect,erection,erotic,erotism,escort,essohbee,eunuch,extacy,extasy,f u c k,f u c k e r,f.u.c.k,f_u_c_k,f4nny,facefucker,facial,fack,fag,fagbag,fagfucker,fagg,fagged,fagging,faggit,faggitt,faggot,faggotcock,faggots,faggs,fagot,fagots,fags,fagtard,faig,faigt,fanny,fannybandit,fannyflaps,fannyfucker,fanyy,fart,fartknocker,fastfuck,fat,fatass,fatfuck,fatfucker,fcuk,fcuker,fcuking,fecal,feck,fecker,felch,felcher,felching,fellate,fellatio,feltch,feltcher,female squirting,femdom,fenian,figging,fingerbang,fingerfuck,fingerfuck,fingerfucked,fingerfucker,fingerfucker,fingerfuckers,fingerfucking,fingerfucks,fingering,fist fuck,fisted,fistfuck,fistfucked,fistfucker,fistfucker,fistfuckers,fistfucking,fistfuckings,fistfucks,fisting,fisty,flamer,flange,flaps,fleshflute,flog the log,floozy,foad,foah,fondle,foobar,fook,fooker,foot fetish,footfuck,footfucker,footjob,footlicker,foreskin,freakfuck,freakyfucker,freefuck,freex,frigg,frigga,frotting,fubar,fuc,fuck,f-u-c-k,fuck buttons,fuck hole,fuck off,fuck puppet,fuck trophy,fuck yo mama,fuck you,fucka,fuckass,fuck-ass,fuckbag,fuck-bitch,fuckboy,fuckbrain,fuckbutt,fuckbutter,fucked,fuckedup,fucker,fuckers,fuckersucker,fuckface,fuckfreak,fuckhead,fuckheads,fuckher,fuckhole,fuckin,fucking,fuckingbitch,fuckings,fuckingshitmotherfucker,fuckme,fuckme,fuckmeat,fuckmehard,fuckmonkey,fucknugget,fucknut,fucknutt,fuckoff,fucks,fuckstick,fucktard,fuck-tard,fucktards,fucktart,fucktoy,fucktwat,fuckup,fuckwad,fuckwhit,fuckwhore,fuckwit,fuckwitt,fuckyou,fudge packer,fudgepacker,fudge-packer,fuk,fuker,fukker,fukkers,fukkin,fuks,fukwhit,fukwit,fuq,futanari,fux,fux0r,fvck,fxck,gae,gai,gang bang,gangbang,gang-bang,gangbanged,gangbangs,ganja,gash,gassy ass,gay sex,gayass,gaybob,gaydo,gayfuck,gayfuckist,gaylord,gays,gaysex,gaytard,gaywad,gender bender,genitals,gey,gfy,ghay,ghey,giant cock,gigolo,ginger,gippo,girl on,girl on top,girls gone wild,git,glans,goatcx,goatse,god damn,godamn,godamnit,goddam,god-dam,goddammit,goddamn,goddamned,god-damned,goddamnit,goddamnmuthafucker,godsdamn,gokkun,golden shower,goldenshower,golliwog,gonad,gonads,gonorrehea,goo girl,gooch,goodpoop,gook,gooks,goregasm,gotohell,gringo,grope,group sex,gspot,g-spot,gtfo,guido,guro,h0m0,h0mo,ham flap,hand job,handjob,hard core,hard on,hardcore,hardcoresex,he11,headfuck,hebe,heeb,hell,hemp,hentai,heroin,herp,herpes,herpy,heshe,he-she,hitler,hiv,ho,hoar,hoare,hobag,hoe,hoer,holy shit,hom0,homey,homo,homodumbshit,homoerotic,homoey,honkey,honky,hooch,hookah,hooker,hoor,hootch,hooter,hooters,hore,horniest,horny,hot carl,hot chick,hotpussy,hotsex,how to kill,how to murdep,how to murder,huge fat,hump,humped,humping,hun,hussy,hymen,iap,iberian slap,inbred,incest,injun,intercourse,j3rk0ff,jack off,jackass,jackasses,jackhole,jackoff,jack-off,jaggi,jagoff,jail bait,jailbait,jap,japs,jelly donut,jerk,jerk off,jerk0ff,jerkass,jerked,jerkoff,jerk-off,jigaboo,jiggaboo,jiggerboo,jism,jiz,jizm,jizz,jizzed,jock,juggs,jungle bunny,junglebunny,junkie,junky,kafir,kawk,kike,kikes,kill,kinbaku,kinkster,kinky,kkk,klan,knob,knob end,knobbing,knobead,knobed,knobend,knobhead,knobjocky,knobjokey,kock,kondum,kondums,kooch,kooches,kootch,kraut,kum,kummer,kumming,kums,kunilingus,kunja,kunt,kwif,kyke,l3i+ch,l3itch,labia,lameass,lardass,leather restraint,leather straight jacket,lech,lemon party,leper,lesbian,lesbians,lesbo,lesbos,lez,lezbian,lezbians,lezbo,lezbos,lezza,lezzie,lezzies,lezzy,lmao,lmfao,loin,loins,lolita,looney,lovemaking,lube,lust,lusting,lusty,m0f0,m0fo,m45terbate,ma5terb8,ma5terbate,mafugly,make me come,male squirting,mams,masochist,massa,masterb8,masterbat,masterbat3,masterbate,master-bate,masterbating,masterbation,masterbations,masturbate,masturbating,masturbation,maxi,mcfagget,menage a trois,menses,menstruate,menstruation,meth,m-fucking,mick,middle finger,midget,milf,minge,minger,missionary position,mof0,mofo,mo-fo,molest,mong,moo moo foo foo,moolie,moron,mothafuck,mothafucka,mothafuckas,mothafuckaz,mothafucked,mothafucker,mothafuckers,mothafuckin,mothafucking,mothafuckings,mothafucks,mother fucker,motherfuck,motherfucka,motherfucked,motherfucker,motherfuckers,motherfuckin,motherfucking,motherfuckings,motherfuckka,motherfucks,mound of venus,mr hands,mtherfucker,mthrfucker,mthrfucking,muff,muff diver,muff puff,muffdiver,muffdiving,munging,munter,murder,mutha,muthafecker,muthafuckaz,muthafuckker,muther,mutherfucker,mutherfucking,muthrfucking,n1gga,n1gger,nad,nads,naked,nambla,napalm,nappy,nawashi,nazi,nazism,need the dick,negro,neonazi,nig nog,nigaboo,nigg3r,nigg4h,nigga,niggah,niggas,niggaz,nigger,niggers,niggle,niglet,nig-nog,nimphomania,nimrod,ninny,nipple,nipples,nob,nob jokey,nobhead,nobjocky,nobjokey,nonce,nooky,nsfw images,nude,nudity,numbnuts,nut butter,nut sack,nutsack,nutter,nympho,nymphomania,octopussy,old bag,omg,omorashi,one cup two girls,one guy one jar,opiate,opium,oral,orally,organ,orgasim,orgasims,orgasm,orgasmic,orgasms,orgies,orgy,ovary,ovum,ovums,p.u.s.s.y.,p0rn,paddy,paedophile,paki,panooch,pansy,pantie,panties,panty,pastie,pasty,pawn,pcp,pecker,peckerhead,pedo,pedobear,pedophile,pedophilia,pedophiliac,pee,peepee,pegging,penetrate,penetration,penial,penile,penis,penisbanger,penisfucker,penispuffer,perversion,peyote,phalli,phallic,phone sex,phonesex,phuck,phuk,phuked,phuking,phukked,phukking,phuks,phuq,piece of shit,pigfucker,pikey,pillowbiter,pimp,pimpis,pinko,piss,piss off,piss pig,pissed,pissed off,pisser,pissers,pisses,pissflaps,pissin,pissing,pissoff,piss-off,pisspig,playboy,pleasure chest,pms,polack,pole smoker,polesmoker,pollock,ponyplay,poof,poon,poonani,poonany,poontang,poop,poop chute,poopchute,poopuncher,porch monkey,porchmonkey,porn,porno,pornography,pornos,pot,potty,prick,pricks,prickteaser,prig,prince albert piercing,prod,pron,prostitute,prude,psycho,pthc,pube,pubes,pubic,pubis,punani,punanny,punany,punkass,punky,punta,puss,pusse,pussi,pussies,pussy,pussy fart,pussy palace,pussylicking,pussypounder,pussys,pust,puto,queaf,queef,queer,queerbait,queerhole,queero,queers,quicky,quim,racy,raghead,raging boner,rape,raped,raper,rapey,raping,rapist,raunch,rectal,rectum,rectus,reefer,reetard,reich,renob,retard,retarded,reverse cowgirl,revue,rimjaw,rimjob,rimming,ritard,rosy palm,rosy palm and her 5 sisters,rtard,r-tard,rubbish,rum,rump,rumprammer,ruski,rusty trombone,s hit,s&m,s.h.i.t.,s.o.b.,s_h_i_t,s0b,sadism,sadist,sambo,sand nigger,sandbar,sandler,sandnigger,sanger,santorum,sausage queen,scag,scantily,scat,schizo,schlong,scissoring,screw,screwed,screwing,scroat,scrog,scrot,scrote,scrotum,scrud,scum,seaman,seamen,seduce,seks,semen,sex,sexo,sexual,sexy,sh!+,sh!t,sh1t,s-h-1-t,shag,shagger,shaggin,shagging,shamedame,shaved beaver,shaved pussy,shemale,shi+,shibari,shirt lifter,shit,s-h-i-t,shit ass,shit fucker,shitass,shitbag,shitbagger,shitblimp,shitbrains,shitbreath,shitcanned,shitcunt,shitdick,shite,shiteater,shited,shitey,shitface,shitfaced,shitfuck,shitfull,shithead,shitheads,shithole,shithouse,shiting,shitings,shits,shitspitter,shitstain,shitt,shitted,shitter,shitters,shittier,shittiest,shitting,shittings,shitty,shiz,shiznit,shota,shrimping,sissy,skag,skank,skeet,skullfuck,slag,slanteye,slave,sleaze,sleazy,slope,slut,slut bucket,slutbag,slutdumper,slutkiss,sluts,smartass,smartasses,smeg,smegma,smut,smutty,snatch,sniper,snowballing,snuff,s-o-b,sod off,sodom,sodomize,sodomy,son of a bitch,son of a motherless goat,son of a whore,son-of-a-bitch,souse,soused,spac,spade,sperm,spic,spick,spik,spiks,splooge,splooge moose,spooge,spook,spread legs,spunk,steamy,stfu,stiffy,stoned,strap on,strapon,strappado,strip,strip club,stroke,stupid,style doggy,suck,suckass,sucked,sucking,sucks,suicide girls,sultry women,sumofabiatch,swastika,swinger,t1t,t1tt1e5,t1tties,taff,taig,tainted love,taking the piss,tampon,tard,tart,taste my,tawdry,tea bagging,teabagging,teat,teets,teez,terd,teste,testee,testes,testical,testicle,testis,threesome,throating,thrust,thug,thundercunt,tied up,tight white,tinkle,tit,tit wank,titfuck,titi,tities,tits,titt,tittie5,tittiefucker,titties,titty,tittyfuck,tittyfucker,tittywank,titwank,toke,tongue in a,toots,topless,tosser,towelhead,tramp,tranny,transsexual,trashy,tribadism,trumped,tub girl,tubgirl,turd,tush,tushy,tw4t,twat,twathead,twatlips,twats,twatty,twatwaffle,twink,twinkie,two fingers,two fingers with tongue,two girls one cup,twunt,twunter,ugly,unclefucker,undies,undressing,unwed,upskirt,urethra play,urinal,urine,urophilia,uterus,uzi,v14gra,v1gra,vag,vagina,vajayjay,va-j-j,valium,venus mound,veqtable,viagra,vibrator,violet wand,virgin,vixen,vjayjay,vodka,vomit,vorarephilia,voyeur,vulgar,vulva,w00se,wad,wang,wank,wanker,wankjob,wanky,wazoo,wedgie,weed,weenie,weewee,weiner,weirdo,wench,wet dream,wetback,wh0re,wh0reface,white power,whitey,whiz,whoar,whoralicious,whore,whorealicious,whorebag,whored,whoreface,whorehopper,whorehouse,whores,whoring,wigger,willies,willy,window licker,wiseass,wiseasses,wog,womb,woody,wop,wrapping men,wrinkled starfish,wtf,xrated,x-rated,xx,xxx,yaoi,yeasty,yellow showers,yid,yiffy,yobbo,zoophile,zoophilia2 girls 1 cup,2g1c,4r5e,5h1t,5hit,a$$,a$$hole,a_s_s,a2m,a54,a55,a55hole,aeolus,ahole,alabama hot pocket,alaskan pipeline,anal,anal impaler,anal leakage,analannie,analprobe,analsex,anilingus,anus,apeshit,ar5e,areola,areole,arian,arrse,arse,arsehole,aryan,ass,ass fuck,ass hole,assault,assbag,assbagger,assbandit,assbang,assbanged,assbanger,assbangs,assbite,assblaster,assclown,asscock,asscracker,asses,assface,assfaces,assfuck,assfucker,ass-fucker,assfukka,assgoblin,assh0le,asshat,ass-hat,asshead,assho1e,asshole,assholes,asshopper,asshore,ass-jabber,assjacker,assjockey,asskiss,asskisser,assklown,asslick,asslicker,asslover,assman,assmaster,assmonkey,assmucus,assmunch,assmuncher,assnigger,asspacker,asspirate,ass-pirate,asspuppies,assranger,assshit,assshole,asssucker,asswad,asswhole,asswhore,asswipe,asswipes,auto erotic,autoerotic,axwound,azazel,azz,b!tch,b00bs,b17ch,b1tch,babe,babeland,babes,baby batter,baby juice,badfuck,ball gag,ball gravy,ball kicking,ball licking,ball sack,ball sucking,ballbag,balllicker,balls,ballsack,bampot,bang,bang (one\'s) box,bangbros,banger,banging,bareback,barely legal,barenaked,barf,barface,barfface,bastard,bastardo,bastards,bastinado,batty boy,bawdy,bazongas,bazooms,bbw,bdsm,beaner,beaners,beardedclam,beastial,beastiality,beatch,beater,beatyourmeat,beaver,beaver cleaver,beaver lips,beef curtain,beef curtains,beer,beeyotch,bellend,bender,beotch,bestial,bestiality,bi+ch,biatch,bicurious,big black,big breasts,big knockers,big tits,bigbastard,bigbutt,bigger,bigtits,bimbo,bimbos,bint,birdlock,bisexual,bi-sexual,bitch,bitch tit,bitchass,bitched,bitcher,bitchers,bitches,bitchez,bitchin,bitching,bitchtits,bitchy,black cock,blonde action,blonde on blonde action,bloodclaat,bloody,bloody hell,blow,blow job,blow me,blow mud,blow your load,blowjob,blowjobs,blue waffle,blumpkin,boang,bod,bodily,bogan,bohunk,boink,boiolas,bollick,bollock,bollocks,bollok,bollox,bomd,bondage,bone,boned,boner,boners,bong,boob,boobies,boobs,booby,booger,bookie,boong,boonga,booobs,boooobs,booooobs,booooooobs,bootee,bootie,booty,booty call,booze,boozer,boozy,bosom,bosomy,bowel,bowels,bra,brassiere,breast,breastjob,breastlover,breastman,breasts,breeder,brotherfucker,brown showers,brunette action,buceta,bugger,buggered,buggery,bukkake,bull shit,bullcrap,bulldike,bulldyke,bullet vibe,bullshit,bullshits,bullshitted,bullturds,bum,bum boy,bumblefuck,bumclat,bumfuck,bummer,bung,bung hole,bunga,bunghole,bunny fucker,bust a load,busty,butchdike,butchdyke,butt,butt fuck,butt plug,buttbang,butt-bang,buttcheeks,buttface,buttfuck,butt-fuck,buttfucka,buttfucker,butt-fucker,butthead,butthole,buttman,buttmuch,buttmunch,buttmuncher,butt-pirate,buttplug,c.0.c.k,c.o.c.k.,c.u.n.t,c0ck,c-0-c-k,c0cksucker,caca,cahone,camel toe,cameltoe,camgirl,camslut,camwhore,carpet muncher,carpetmuncher,cawk,cervix,chesticle,chi-chi man,chick with a dick,child-fucker,chin,chinc,chincs,chink,chinky,choad,choade,choc ice,chocolate rosebuds,chode,chodes,chota bags,cipa,circlejerk,cl1t,cleveland steamer,climax,clit,clit licker,clitface,clitfuck,clitoris,clitorus,clits,clitty,clitty litter,clogwog,clover clamps,clunge,clusterfuck,cnut,cocain,cocaine,cock,c-o-c-k,cock pocket,cock snot,cock sucker,cockass,cockbite,cockblock,cockburger,cockeye,cockface,cockfucker,cockhead,cockholster,cockjockey,cockknocker,cockknoker,cocklicker,cocklover,cocklump,cockmaster,cockmongler,cockmongruel,cockmonkey,cockmunch,cockmuncher,cocknose,cocknugget,cocks,cockshit,cocksmith,cocksmoke,cocksmoker,cocksniffer,cocksucer,cocksuck,cocksuck,cocksucked,cocksucker,cock-sucker,cocksuckers,cocksucking,cocksucks,cocksuka,cocksukka,cockwaffle,coffin dodger,coital,cok,cokmuncher,coksucka,commie,condom,coochie,coochy,coon,coonnass,coons,cooter,cop some wood,coprolagnia,coprophilia,corksucker,cornhole,corp whore,cox,crabs,crack,cracker,crackwhore,crack-whore,crap,crappy,creampie,cretin,crikey,cripple,crotte,cum,cum chugger,cum dumpster,cum freak,cum guzzler,cumbubble,cumdump,cumdumpster,cumguzzler,cumjockey,cummer,cummin,cumming,cums,cumshot,cumshots,cumslut,cumstain,cumtart,cunilingus,cunillingus,cunn,cunnie,cunnilingus,cunntt,cunny,cunt,c-u-n-t,cunt hair,cuntass,cuntbag,cuntface,cuntfuck,cuntfucker,cunthole,cunthunter,cuntlick,cuntlick,cuntlicker,cuntlicker,cuntlicking,cuntrag,cunts,cuntsicle,cuntslut,cunt-struck,cuntsucker,cut rope,cyalis,cyberfuc,cyberfuck,cyberfucked,cyberfucker,cyberfuckers,cyberfucking,cybersex,d0ng,d0uch3,d0uche,d1ck,d1ld0,d1ldo,dago,dagos,dammit,damn,damned,damnit,darkie,darn,date rape,daterape,dawgie-style,deep throat,deepthroat,deggo,dendrophilia,dick,dick head,dick hole,dick shy,dickbag,dickbeaters,dickbrain,dickdipper,dickface,dickflipper,dickfuck,dickfucker,dickhead,dickheads,dickhole,dickish,dick-ish,dickjuice,dickmilk,dickmonger,dickripper,dicks,dicksipper,dickslap,dick-sneeze,dicksucker,dicksucking,dicktickler,dickwad,dickweasel,dickweed,dickwhipper,dickwod,dickzipper,diddle,dike,dildo,dildos,diligaf,dillweed,dimwit,dingle,dingleberries,dingleberry,dink,dinks,dipship,dipshit,dirsa,dirty,dirty pillows,dirty sanchez,dlck,dog style,dog-fucker,doggie style,doggiestyle,doggie-style,doggin,dogging,doggy style,doggystyle,doggy-style,dolcett,domination,dominatrix,dommes,dong,donkey punch,donkeypunch,donkeyribber,doochbag,doofus,dookie,doosh,dopey,double dong,double penetration,doublelift,douch3,douche,douchebag,douchebags,douche-fag,douchewaffle,douchey,dp action,drunk,dry hump,duche,dumass,dumb ass,dumbass,dumbasses,dumbcunt,dumbfuck,dumbshit,dummy,dumshit,dvda,dyke,dykes,eat a dick,eat hair pie,eat my ass,eatpussy,ecchi,ejaculate,ejaculated,ejaculates,ejaculating,ejaculatings,ejaculation,ejakulate,enlargement,erect,erection,erotic,erotism,escort,essohbee,eunuch,extacy,extasy,f u c k,f u c k e r,f.u.c.k,f_u_c_k,f4nny,facefucker,facial,fack,fag,fagbag,fagfucker,fagg,fagged,fagging,faggit,faggitt,faggot,faggotcock,faggots,faggs,fagot,fagots,fags,fagtard,faig,faigt,fanny,fannybandit,fannyflaps,fannyfucker,fanyy,fart,fartknocker,fastfuck,fat,fatass,fatfuck,fatfucker,fcuk,fcuker,fcuking,fecal,feck,fecker,felch,felcher,felching,fellate,fellatio,feltch,feltcher,female squirting,femdom,fenian,figging,fingerbang,fingerfuck,fingerfuck,fingerfucked,fingerfucker,fingerfucker,fingerfuckers,fingerfucking,fingerfucks,fingering,fist fuck,fisted,fistfuck,fistfucked,fistfucker,fistfucker,fistfuckers,fistfucking,fistfuckings,fistfucks,fisting,fisty,flamer,flange,flaps,fleshflute,flog the log,floozy,foad,foah,fondle,foobar,fook,fooker,foot fetish,footfuck,footfucker,footjob,footlicker,foreskin,freakfuck,freakyfucker,freefuck,freex,frigg,frigga,frotting,fubar,fuc,fuck,f-u-c-k,fuck buttons,fuck hole,fuck off,fuck puppet,fuck trophy,fuck yo mama,fuck you,fucka,fuckass,fuck-ass,fuckbag,fuck-bitch,fuckboy,fuckbrain,fuckbutt,fuckbutter,fucked,fuckedup,fucker,fuckers,fuckersucker,fuckface,fuckfreak,fuckhead,fuckheads,fuckher,fuckhole,fuckin,fucking,fuckingbitch,fuckings,fuckingshitmotherfucker,fuckme,fuckme,fuckmeat,fuckmehard,fuckmonkey,fucknugget,fucknut,fucknutt,fuckoff,fucks,fuckstick,fucktard,fuck-tard,fucktards,fucktart,fucktoy,fucktwat,fuckup,fuckwad,fuckwhit,fuckwhore,fuckwit,fuckwitt,fuckyou,fudge packer,fudgepacker,fudge-packer,fuk,fuker,fukker,fukkers,fukkin,fuks,fukwhit,fukwit,fuq,futanari,fux,fux0r,fvck,fxck,gae,gai,gang bang,gangbang,gang-bang,gangbanged,gangbangs,ganja,gash,gassy ass,gay sex,gayass,gaybob,gaydo,gayfuck,gayfuckist,gaylord,gays,gaysex,gaytard,gaywad,gender bender,genitals,gey,gfy,ghay,ghey,giant cock,gigolo,ginger,gippo,girl on,girl on top,girls gone wild,git,glans,goatcx,goatse,god damn,godamn,godamnit,goddam,god-dam,goddammit,goddamn,goddamned,god-damned,goddamnit,goddamnmuthafucker,godsdamn,gokkun,golden shower,goldenshower,golliwog,gonad,gonads,gonorrehea,goo girl,gooch,goodpoop,gook,gooks,goregasm,gotohell,gringo,grope,group sex,gspot,g-spot,gtfo,guido,guro,h0m0,h0mo,ham flap,hand job,handjob,hard core,hard on,hardcore,hardcoresex,he11,headfuck,hebe,heeb,hell,hemp,hentai,heroin,herp,herpes,herpy,heshe,he-she,hitler,hiv,ho,hoar,hoare,hobag,hoe,hoer,holy shit,hom0,homey,homo,homodumbshit,homoerotic,homoey,honkey,honky,hooch,hookah,hooker,hoor,hootch,hooter,hooters,hore,horniest,horny,hot carl,hot chick,hotpussy,hotsex,how to kill,how to murdep,how to murder,huge fat,hump,humped,humping,hun,hussy,hymen,iap,iberian slap,inbred,incest,injun,intercourse,j3rk0ff,jack off,jackass,jackasses,jackhole,jackoff,jack-off,jaggi,jagoff,jail bait,jailbait,jap,japs,jelly donut,jerk,jerk off,jerk0ff,jerkass,jerked,jerkoff,jerk-off,jigaboo,jiggaboo,jiggerboo,jism,jiz,jizm,jizz,jizzed,jock,juggs,jungle bunny,junglebunny,junkie,junky,kafir,kawk,kike,kikes,kill,kinbaku,kinkster,kinky,kkk,klan,knob,knob end,knobbing,knobead,knobed,knobend,knobhead,knobjocky,knobjokey,kock,kondum,kondums,kooch,kooches,kootch,kraut,kum,kummer,kumming,kums,kunilingus,kunja,kunt,kwif,kyke,l3i+ch,l3itch,labia,lameass,lardass,leather restraint,leather straight jacket,lech,lemon party,leper,lesbian,lesbians,lesbo,lesbos,lez,lezbian,lezbians,lezbo,lezbos,lezza,lezzie,lezzies,lezzy,lmao,lmfao,loin,loins,lolita,looney,lovemaking,lube,lust,lusting,lusty,m0f0,m0fo,m45terbate,ma5terb8,ma5terbate,mafugly,make me come,male squirting,mams,masochist,massa,masterb8,masterbat,masterbat3,masterbate,master-bate,masterbating,masterbation,masterbations,masturbate,masturbating,masturbation,maxi,mcfagget,menage a trois,menses,menstruate,menstruation,meth,m-fucking,mick,middle finger,midget,milf,minge,minger,missionary position,mof0,mofo,mo-fo,molest,mong,moo moo foo foo,moolie,moron,mothafuck,mothafucka,mothafuckas,mothafuckaz,mothafucked,mothafucker,mothafuckers,mothafuckin,mothafucking,mothafuckings,mothafucks,mother fucker,motherfuck,motherfucka,motherfucked,motherfucker,motherfuckers,motherfuckin,motherfucking,motherfuckings,motherfuckka,motherfucks,mound of venus,mr hands,mtherfucker,mthrfucker,mthrfucking,muff,muff diver,muff puff,muffdiver,muffdiving,munging,munter,murder,mutha,muthafecker,muthafuckaz,muthafuckker,muther,mutherfucker,mutherfucking,muthrfucking,n1gga,n1gger,nad,nads,naked,nambla,napalm,nappy,nawashi,nazi,nazism,need the dick,negro,neonazi,nig nog,nigaboo,nigg3r,nigg4h,nigga,niggah,niggas,niggaz,nigger,niggers,niggle,niglet,nig-nog,nimphomania,nimrod,ninny,nipple,nipples,nob,nob jokey,nobhead,nobjocky,nobjokey,nonce,nooky,nsfw images,nude,nudity,numbnuts,nut butter,nut sack,nutsack,nutter,nympho,nymphomania,octopussy,old bag,omg,omorashi,one cup two girls,one guy one jar,opiate,opium,oral,orally,organ,orgasim,orgasims,orgasm,orgasmic,orgasms,orgies,orgy,ovary,ovum,ovums,p.u.s.s.y.,p0rn,paddy,paedophile,paki,panooch,pansy,pantie,panties,panty,pastie,pasty,pawn,pcp,pecker,peckerhead,pedo,pedobear,pedophile,pedophilia,pedophiliac,pee,peepee,pegging,penetrate,penetration,penial,penile,penis,penisbanger,penisfucker,penispuffer,perversion,peyote,phalli,phallic,phone sex,phonesex,phuck,phuk,phuked,phuking,phukked,phukking,phuks,phuq,piece of shit,pigfucker,pikey,pillowbiter,pimp,pimpis,pinko,piss,piss off,piss pig,pissed,pissed off,pisser,pissers,pisses,pissflaps,pissin,pissing,pissoff,piss-off,pisspig,playboy,pleasure chest,pms,polack,pole smoker,polesmoker,pollock,ponyplay,poof,poon,poonani,poonany,poontang,poop,poop chute,poopchute,poopuncher,porch monkey,porchmonkey,porn,porno,pornography,pornos,pot,potty,prick,pricks,prickteaser,prig,prince albert piercing,prod,pron,prostitute,prude,psycho,pthc,pube,pubes,pubic,pubis,punani,punanny,punany,punkass,punky,punta,puss,pusse,pussi,pussies,pussy,pussy fart,pussy palace,pussylicking,pussypounder,pussys,pust,puto,queaf,queef,queer,queerbait,queerhole,queero,queers,quicky,quim,racy,raghead,raging boner,rape,raped,raper,rapey,raping,rapist,raunch,rectal,rectum,rectus,reefer,reetard,reich,renob,retard,retarded,reverse cowgirl,revue,rimjaw,rimjob,rimming,ritard,rosy palm,rosy palm and her 5 sisters,rtard,r-tard,rubbish,rum,rump,rumprammer,ruski,rusty trombone,s hit,s&m,s.h.i.t.,s.o.b.,s_h_i_t,s0b,sadism,sadist,sambo,sand nigger,sandbar,sandler,sandnigger,sanger,santorum,sausage queen,scag,scantily,scat,schizo,schlong,scissoring,screw,screwed,screwing,scroat,scrog,scrot,scrote,scrotum,scrud,scum,seaman,seamen,seduce,seks,semen,sex,sexo,sexual,sexy,sh!+,sh!t,sh1t,s-h-1-t,shag,shagger,shaggin,shagging,shamedame,shaved beaver,shaved pussy,shemale,shi+,shibari,shirt lifter,shit,s-h-i-t,shit ass,shit fucker,shitass,shitbag,shitbagger,shitblimp,shitbrains,shitbreath,shitcanned,shitcunt,shitdick,shite,shiteater,shited,shitey,shitface,shitfaced,shitfuck,shitfull,shithead,shitheads,shithole,shithouse,shiting,shitings,shits,shitspitter,shitstain,shitt,shitted,shitter,shitters,shittier,shittiest,shitting,shittings,shitty,shiz,shiznit,shota,shrimping,sissy,skag,skank,skeet,skullfuck,slag,slanteye,slave,sleaze,sleazy,slope,slut,slut bucket,slutbag,slutdumper,slutkiss,sluts,smartass,smartasses,smeg,smegma,smut,smutty,snatch,sniper,snowballing,snuff,s-o-b,sod off,sodom,sodomize,sodomy,son of a bitch,son of a motherless goat,son of a whore,son-of-a-bitch,souse,soused,spac,spade,sperm,spic,spick,spik,spiks,splooge,splooge moose,spooge,spook,spread legs,spunk,steamy,stfu,stiffy,stoned,strap on,strapon,strappado,strip,strip club,stroke,stupid,style doggy,suck,suckass,sucked,sucking,sucks,suicide girls,sultry women,sumofabiatch,swastika,swinger,t1t,t1tt1e5,t1tties,taff,taig,tainted love,taking the piss,tampon,tard,tart,taste my,tawdry,tea bagging,teabagging,teat,teets,teez,terd,teste,testee,testes,testical,testicle,testis,threesome,throating,thrust,thug,thundercunt,tied up,tight white,tinkle,tit,tit wank,titfuck,titi,tities,tits,titt,tittie5,tittiefucker,titties,titty,tittyfuck,tittyfucker,tittywank,titwank,toke,tongue in a,toots,topless,tosser,towelhead,tramp,tranny,transsexual,trashy,tribadism,trumped,tub girl,tubgirl,turd,tush,tushy,tw4t,twat,twathead,twatlips,twats,twatty,twatwaffle,twink,twinkie,two fingers,two fingers with tongue,two girls one cup,twunt,twunter,ugly,unclefucker,undies,undressing,unwed,upskirt,urethra play,urinal,urine,urophilia,uterus,uzi,v14gra,v1gra,vag,vagina,vajayjay,va-j-j,valium,venus mound,veqtable,viagra,vibrator,violet wand,virgin,vixen,vjayjay,vodka,vomit,vorarephilia,voyeur,vulgar,vulva,w00se,wad,wang,wank,wanker,wankjob,wanky,wazoo,wedgie,weed,weenie,weewee,weiner,weirdo,wench,wet dream,wetback,wh0re,wh0reface,white power,whitey,whiz,whoar,whoralicious,whore,whorealicious,whorebag,whored,whoreface,whorehopper,whorehouse,whores,whoring,wigger,willies,willy,window licker,wiseass,wiseasses,wog,womb,woody,wop,wrapping men,wrinkled starfish,wtf,xrated,x-rated,xx,xxx,yaoi,yeasty,yellow showers,yid,yiffy,yobbo,zoophile,zoophilia,zubb\r\n\r\n', '2023-02-25 19:52:21', '2023-02-25 19:52:21'),
(34, 'gago, gaga', '2023-02-25 20:11:15', '2023-02-25 20:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `id` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`id`, `course`, `description`, `created_at`, `updated_at`) VALUES
(1, 'BSE', 'Bachelor of Science in Entrepreneurship', '2023-02-26 19:01:22', '2023-06-01 15:24:59'),
(2, 'BPA', 'Bachelor of Public Administration', '2023-02-26 19:00:53', '2023-06-01 15:24:56'),
(3, 'BSIT', 'Bachelor of Science in Information Technology', '2023-06-03 17:10:27', '2023-06-03 23:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_links`
--

CREATE TABLE `tbl_links` (
  `id` int(11) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `twitter` varchar(250) NOT NULL,
  `instagram` varchar(250) NOT NULL,
  `youtube` varchar(250) NOT NULL,
  `gmail` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_links`
--

INSERT INTO `tbl_links` (`id`, `facebook`, `twitter`, `instagram`, `youtube`, `gmail`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.instagram.com/', 'https://www.youtube.com/', 'polacommunitycollege2020@gmal.com', '2023-04-18 03:37:24', '2023-04-18 03:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `id` int(11) NOT NULL,
  `activity` varchar(250) NOT NULL,
  `details` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`id`, `activity`, `details`, `created_at`, `updated_at`) VALUES
(142, 'Updated Staff', 'admin Updated Staff- ID : 3', '2023-05-08 05:09:05', '0000-00-00 00:00:00'),
(143, 'Updated Student Details', 'admin Updated Student Details - ID : 6 data : avatar3.jpg2023-1JohnMDela Cruz2023-03-0923Male5\'665sampleFilipinoSampleSingle09123456789john@gmail.comSampleSampleSampleSampleSample2023202320232023BSE1st Year2023-05-09 02:22:15', '2023-05-09 02:22:15', '0000-00-00 00:00:00'),
(144, 'Updated Student Details', 'admin Updated Student Details - ID : 7 data : 2023-2JuanADela Cruz2023-04-1223Male5\'665sampleFilipinoSampleSingle09123456789onilevaeduj@gmail.comSampleSampleSampleSample52062023202320232023BSE1st Year2023-05-09 03:37:04', '2023-05-09 03:37:04', '0000-00-00 00:00:00'),
(145, 'Updated Student Details', 'admin Updated Student Details - ID : 7 data : 2023-2JuanADela Cruz2023-04-1223Male5\'665sampleFilipinoSampleSingle09123456789onilevaeduj@gmail.comSampleSampleSampleSample52062023202320232023BSE2nd Year2023-05-09 03:37:32', '2023-05-09 03:37:32', '0000-00-00 00:00:00'),
(146, 'Updated Student Details', 'admin Updated Student Details - ID : 7 data : 2023-2JuanADela Cruz2023-04-1223Male5\'665sampleFilipinoSampleSingle09123456789onilevaeduj@gmail.comSampleSampleSampleSample52062023202320232023BSE3rd Year2023-05-09 07:22:25', '2023-05-09 07:22:25', '0000-00-00 00:00:00'),
(147, 'Updated Student Details', 'admin Updated Student Details - ID : 7 data : 2023-2JuanADela Cruz2023-04-1223Male5\'665sampleFilipinoSampleSingle09123456789onilevaeduj@gmail.comSampleSampleSampleSample52062023202320232023BSE4th Year2023-05-09 07:27:54', '2023-05-09 07:27:54', '0000-00-00 00:00:00'),
(148, 'Updated Student Details', 'admin Updated Student Details - ID : 7 data : 2023-2JuanADela Cruz2023-04-1223Male5\'665sampleFilipinoSampleSingle09123456789onilevaeduj@gmail.comSampleSampleSampleSample52062023202320232023BSE1st Year2023-05-09 09:36:19', '2023-05-09 09:36:19', '0000-00-00 00:00:00'),
(149, 'Updated Student Details', 'admin Updated Student Details - ID : 6 data : 2023-1121JohnMDela Cruz2023-03-0923Male5\'665sampleFilipinoSampleSingle09123456789john@gmail.comSampleSampleSampleSampleSample2023202320232023BSE1st Year2023-06-01 12:38:31', '2023-06-01 12:38:31', '0000-00-00 00:00:00'),
(150, 'Added Student', 'admin Added Student - data : 2023-1121121232Marc AndreiSaGobison2023-06-013Male17560sasaFilipinosaSingle09455286162marcandrei.gobison@gmail.comsaZone 1 Pola Oriental MindoroPolaManila5206Marc Andrei Gobison2023202320232023BSE12nd Year2023-06-01 12:39', '2023-06-01 12:39:09', '0000-00-00 00:00:00'),
(151, 'Added Student', 'admin Added Student - data : 2023-11217879Marc AndreiGobison2023-06-153Male17560sasaFilipinosaSingle09455286162marcandrei232.gobison@gmail.comsaZone 1 Pola Oriental MindoroPolaManila5206Marc Andrei Gobison2023202320232023BPA12nd Year2023-06-01 13:03:', '2023-06-01 13:03:35', '0000-00-00 00:00:00'),
(152, 'Updated Student Details', 'admin Updated Student Details - ID : 19 data : 2023-23Marc AndreiSaGobison2023-06-013Male17560sasaFilipinosaSingle09455286162marcandrei.gobison@gmail.comsaZone 1 Pola Oriental MindoroPolaManila5206Marc Andrei Gobison2023202320232023BSE12nd Year2023-0', '2023-06-01 13:03:48', '0000-00-00 00:00:00'),
(153, 'Deleted Student/s', 'admin Deleted Student/s - ID : 1920', '2023-06-01 13:04:11', '0000-00-00 00:00:00'),
(154, 'Deleted Student', 'admin Deleted Student - ID : 20', '2023-06-01 13:06:37', '0000-00-00 00:00:00'),
(155, 'Deleted Student', 'admin Deleted Student - ID : 20', '2023-06-01 13:06:51', '0000-00-00 00:00:00'),
(156, 'Added Student', 'admin Added Student - data : 2023-112112123267657Marc AndreiGobison2023-06-2821Male17560sasaFilipinosaSingle09455286162marcandrei.gobison@gmail.comssssaZone 1 Pola Oriental MindoroPolaManila5206Marc Andrei Gobison2023202320232023BPA12nd Year2023-06-0', '2023-06-01 13:17:37', '0000-00-00 00:00:00'),
(157, 'Deleted Student/s', 'admin Deleted Student/s - ID : 1921', '2023-06-01 13:17:53', '0000-00-00 00:00:00'),
(158, 'Deleted Student', 'admin Deleted Student - ID : 21', '2023-06-01 13:19:07', '0000-00-00 00:00:00'),
(159, 'Deleted Student/s', 'admin Deleted Student/s - ID : 1719', '2023-06-01 13:25:06', '0000-00-00 00:00:00'),
(160, 'Deleted Student/s', 'admin Deleted Student/s - ID : 19', '2023-06-01 13:27:20', '0000-00-00 00:00:00'),
(161, 'Deleted Student/s', 'admin Deleted Student/s - ID : 17, 19', '2023-06-01 13:28:48', '0000-00-00 00:00:00'),
(162, 'Deleted Student/s', 'admin Deleted Student/s - ID : 17, 19', '2023-06-01 13:30:35', '0000-00-00 00:00:00'),
(163, 'Deleted Student', 'admin Deleted Student - ID : 13', '2023-06-01 13:31:26', '0000-00-00 00:00:00'),
(164, 'Updated program/course', 'admin Updated program/course - ID : 1 to BPA2', '2023-06-01 15:24:43', '0000-00-00 00:00:00'),
(165, 'Updated program/course', 'admin Updated program/course - ID : 2 to BSE2', '2023-06-01 15:24:50', '0000-00-00 00:00:00'),
(166, 'Updated program/course', 'admin Updated program/course - ID : 1 to BPA', '2023-06-01 15:24:56', '0000-00-00 00:00:00'),
(167, 'Updated program/course', 'admin Updated program/course - ID : 2 to BSE', '2023-06-01 15:24:59', '0000-00-00 00:00:00'),
(168, 'Added New Program', 'admin Added Program -BSIT', '2023-06-01 15:25:10', '0000-00-00 00:00:00'),
(169, 'Deleted program', 'admin Deleted Signatory ID : 3', '2023-06-01 15:26:17', '0000-00-00 00:00:00'),
(170, 'Added Student', 'admin Added Student - data : 2023-112112123234Marc AndreiGobison2023-06-281Male17560sasaFilipinosaSingle09455286162marcandreiedwe.gobison@gmail.comsaZone 1 Pola Oriental MindoroPolaManila5206Marc Andrei Gobison2023202320232023BPA11st Year2023-06-01 1', '2023-06-01 16:24:12', '0000-00-00 00:00:00'),
(171, 'Updated Student Details', 'admin Updated Student Details - ID : 6 data : 2023-1121JohnMDela Cruz2023-03-0923Male5\'665sampleFilipinoSampleSingle09123456789john@gmail.comSampleSampleSampleSampleSample2023202320232023BSEregular1st Year2023-06-02 15:42:32', '2023-06-02 15:42:32', '0000-00-00 00:00:00'),
(172, 'Updated Student Details', 'admin Updated Student Details - ID : 6 data : 2023-1121JohnMDela Cruz2023-03-0923Male5\'665sampleFilipinoSampleSingle09123456789john@gmail.comSampleSampleSampleSampleSample2023202320232023BSEregular2023-06-081st Year2023-06-03 04:08:38', '2023-06-03 04:08:38', '0000-00-00 00:00:00'),
(173, 'Updated Student Details', 'admin Updated Student Details - ID : 6 data : 2023-1121JohnMDela Cruz2023-03-0923Male5\'665sampleFilipinoSampleSingle09123456789john@gmail.comSampleSampleSampleSampleSample2023202320232023BSEregular2023-06-0211st Year2023-06-03 04:09:44', '2023-06-03 04:09:44', '0000-00-00 00:00:00'),
(174, 'Added New Program', 'admin Added Program -BSIT', '2023-06-03 17:10:27', '0000-00-00 00:00:00'),
(175, 'Added Student', 'admin Added Student - data : 2023-0112Marc AndreiGobison2000-07-2822Male17560PolaFilipinoCatholicSingle09455286162marcandrei.gobison@gmail.commarcandrei.gobison@gmail.comZone 1 Pola Oriental MindoroPolaManila5206KristineNONEPolaMINSU2023CalapanCalapa', '2023-06-03 17:13:00', '0000-00-00 00:00:00'),
(176, 'Updated Staff', 'admin Updated Staff- ID : 1', '2023-06-04 14:36:58', '0000-00-00 00:00:00'),
(177, 'Updated Staff', 'admin Updated Staff- ID : 1', '2023-06-04 14:42:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program`
--

CREATE TABLE `tbl_program` (
  `id` int(11) NOT NULL,
  `program` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_program`
--

INSERT INTO `tbl_program` (`id`, `program`, `date_created`, `date_updated`) VALUES
(1, 'Bachelor of Science in Entrepreneurship', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Bachelor of Public Administration', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school_year`
--

CREATE TABLE `tbl_school_year` (
  `id` int(11) NOT NULL,
  `school_year` varchar(250) NOT NULL,
  `status` varchar(8) NOT NULL COMMENT 'active or inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_school_year`
--

INSERT INTO `tbl_school_year` (`id`, `school_year`, `status`, `created_at`, `updated_at`) VALUES
(1, '2022-2023', 'active', '2023-02-27 08:35:14', '2023-04-27 08:21:33'),
(6, '2023-2024', 'inactive', '2023-02-28 11:31:52', '2023-04-27 08:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_signatory`
--

CREATE TABLE `tbl_signatory` (
  `id` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL,
  `status` varchar(10) NOT NULL COMMENT 'active or inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_signatory`
--

INSERT INTO `tbl_signatory` (`id`, `fullname`, `position`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Baby Mylin M. Vargas', 'College Registrar', 'active', '2023-04-27 13:07:16', '2023-04-27 09:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `type` varchar(11) NOT NULL,
  `active_status` varchar(10) NOT NULL,
  `last_activity` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`id`, `username`, `password`, `type`, `active_status`, `last_activity`, `created_at`, `updated_at`) VALUES
(1, 'admin1', 'd41d8cd98f00b204e9800998ecf8427e', 'admin', 'active', 1686042724, '2023-03-24 15:44:31', '2023-06-05 18:32:49'),
(3, 'staff', '1253208465b1efa876f982d8a9e73eef', 'staff', 'inactive', 1685882893, '2023-05-04 10:05:32', '2023-05-08 05:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `extension` varchar(100) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(6) DEFAULT NULL,
  `height` varchar(45) DEFAULT NULL,
  `weight` varchar(45) DEFAULT NULL,
  `birthplace` varchar(255) DEFAULT NULL,
  `citizenship` varchar(100) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL,
  `civil_status` varchar(45) DEFAULT NULL,
  `mobile_no` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city_municipality` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `zip_code` varchar(45) DEFAULT NULL,
  `father` varchar(255) DEFAULT NULL,
  `mother` varchar(255) DEFAULT NULL,
  `guardian` varchar(255) DEFAULT NULL,
  `f_occupation` varchar(250) DEFAULT NULL,
  `m_occupation` varchar(250) DEFAULT NULL,
  `g_relationship` varchar(100) DEFAULT NULL,
  `f_contact` varchar(11) DEFAULT NULL,
  `m_contact` varchar(11) DEFAULT NULL,
  `g_contact` varchar(11) DEFAULT NULL,
  `f_birthdate` date DEFAULT NULL,
  `m_birthdate` date DEFAULT NULL,
  `g_birthdate` date DEFAULT NULL,
  `parent_address` varchar(255) DEFAULT NULL,
  `guardian_address` varchar(255) DEFAULT NULL,
  `ws_company` varchar(255) DEFAULT NULL,
  `ws_position` varchar(255) DEFAULT NULL,
  `ws_date_started` date DEFAULT NULL,
  `ws_employer` varchar(255) DEFAULT NULL,
  `ws_employer_contact` varchar(11) DEFAULT NULL,
  `ws_company_address` varchar(255) DEFAULT NULL,
  `program` varchar(255) DEFAULT NULL,
  `program_id` int(11) NOT NULL,
  `year_level` varchar(100) DEFAULT NULL,
  `sem` varchar(45) DEFAULT NULL,
  `class_id` varchar(100) DEFAULT NULL,
  `tertiary_school_last_attended` varchar(255) DEFAULT NULL,
  `tertiary_school_address` varchar(255) DEFAULT NULL,
  `tertiary_school_year_last_attended` varchar(100) DEFAULT NULL,
  `tertiary_city` varchar(250) DEFAULT NULL,
  `tertiary_province` varchar(250) DEFAULT NULL,
  `secondary_school_last_attended` varchar(255) DEFAULT NULL,
  `secondary_school_address` varchar(255) DEFAULT NULL,
  `secondary_school_year_last_attended` varchar(100) DEFAULT NULL,
  `secondary_city` varchar(250) DEFAULT NULL,
  `secondary_province` varchar(250) DEFAULT NULL,
  `secondary_junior_school_last_attended` varchar(255) DEFAULT NULL,
  `secondary_junior_school_year_last_attended` varchar(100) DEFAULT NULL,
  `secondary_junior_school_address` varchar(255) DEFAULT NULL,
  `secondary_junior_city` varchar(250) DEFAULT NULL,
  `secondary_junior_province` varchar(250) DEFAULT NULL,
  `primary_school_last_attended` varchar(255) DEFAULT NULL,
  `primary_school_year_last_attended` varchar(100) DEFAULT NULL,
  `primary_school_address` varchar(255) DEFAULT NULL,
  `primary_city` varchar(250) DEFAULT NULL,
  `primary_province` varchar(250) DEFAULT NULL,
  `status` varchar(50) NOT NULL COMMENT 'regular, irregular',
  `date_enrolled` date DEFAULT NULL,
  `date_created` date DEFAULT current_timestamp(),
  `date_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `student_id`, `img`, `lname`, `fname`, `mname`, `extension`, `birthdate`, `age`, `sex`, `height`, `weight`, `birthplace`, `citizenship`, `religion`, `civil_status`, `mobile_no`, `email`, `facebook`, `address`, `city_municipality`, `province`, `zip_code`, `father`, `mother`, `guardian`, `f_occupation`, `m_occupation`, `g_relationship`, `f_contact`, `m_contact`, `g_contact`, `f_birthdate`, `m_birthdate`, `g_birthdate`, `parent_address`, `guardian_address`, `ws_company`, `ws_position`, `ws_date_started`, `ws_employer`, `ws_employer_contact`, `ws_company_address`, `program`, `program_id`, `year_level`, `sem`, `class_id`, `tertiary_school_last_attended`, `tertiary_school_address`, `tertiary_school_year_last_attended`, `tertiary_city`, `tertiary_province`, `secondary_school_last_attended`, `secondary_school_address`, `secondary_school_year_last_attended`, `secondary_city`, `secondary_province`, `secondary_junior_school_last_attended`, `secondary_junior_school_year_last_attended`, `secondary_junior_school_address`, `secondary_junior_city`, `secondary_junior_province`, `primary_school_last_attended`, `primary_school_year_last_attended`, `primary_school_address`, `primary_city`, `primary_province`, `status`, `date_enrolled`, `date_created`, `date_updated`) VALUES
(6, '2023-1121', 'avatar3.jpg', 'Dela Cruz', 'John', 'M', NULL, '2023-03-09', 23, 'Male', '5\'6', '65', 'sample', 'Filipino', 'Sample', 'Single', '09123456789', 'john@gmail.com', 'Sample', 'Sample', 'Sample', 'Sample', 'Sample', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '', 'BSE', 0, '1st Year', '1', 'none', '', '', '2023', '', '', '', '', '2023', '', '', '', '2023', '', '', '', '', '2023', '', '', '', 'regular', '2023-06-02', '2023-03-31', '2023-06-03'),
(7, '2023-2', 'avatar.jpg', 'Dela Cruz', 'Juan', 'A', NULL, '2023-04-12', 23, 'Male', '5\'6', '65', 'sample', 'Filipino', 'Sample', 'Single', '09123456789', 'onilevaeduj@gmail.com', 'Sample', 'Sample', 'Sample', 'Sample', '5206', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '', 'BSE', 0, '1st Year', NULL, 'none', '', '', '2023', '', '', '', '', '2023', '', '', '', '2023', '', '', '', '', '2023', '', '', '', '', NULL, '2023-04-13', '2023-05-09'),
(8, '2023-3', 'avatar1.jpg', 'Dela Cruz', 'Juan', 'A', NULL, '2023-04-12', 23, 'Male', '5\'6', '65', 'sample', 'Filipino', 'Sample', 'Single', '09123456789', 'jiohnsad@gmail.com', 'Sample', 'Sample', 'Sample', 'Sample', '5206', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '', 'BSE', 0, '2nd Year', NULL, 'none', '', '', '2023', '', '', '', '', '2023', '', '', '', '2023', '', '', '', '', '2023', '', '', '', '', NULL, '2023-04-13', '2023-04-25'),
(9, '2023-4', 'avatar1.jpg', 'Dela Cruz', 'Juan', 'A', NULL, '2023-04-12', 23, 'Male', '5\'6', '65', 'sample', 'Filipino', 'Sample', 'Single', '09123456789', 'sadfdgfdgf@gmail.com', 'Sample', 'Sample', 'Sample', 'Sample', '5206', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '', 'BSE', 0, '3rd Year', NULL, 'none', '', '', '2023', '', '', '', '', '2023', '', '', '', '2023', '', '', '', '', '2023', '', '', '', '', NULL, '2021-04-13', '2023-04-25'),
(10, '2023-5', 'avatar1.jpg', 'Dela Cruz', 'Juan', 'A', NULL, '2023-04-12', 23, 'Male', '5\'6', '65', 'sample', 'Filipino', 'Sample', 'Single', '09123456789', 'sadfdgfdgwqe3f@gmail.com', 'Sample', 'Sample', 'Sample', 'Sample', '5206', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '', 'BPA', 0, '4th Year', NULL, 'none', '', '', '2023', '', '', '', '', '2023', '', '', '', '2023', '', '', '', '', '2023', '', '', '', '', NULL, '2021-04-13', '2023-04-25'),
(11, '2023-6', 'avatar1.jpg', 'Dela Cruz', 'Juan', 'A', NULL, '2023-04-12', 23, 'Male', '5\'6', '65', 'sample', 'Filipino', 'Sample', 'Single', '09123456789', 'sadfdgfdg23wqe3f@gmail.com', 'Sample', 'Sample', 'Sample', 'Sample', '5206', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '', 'BPA', 0, '1st Year', NULL, 'none', '', '', '2023', '', '', '', '', '2023', '', '', '', '2023', '', '', '', '', '2023', '', '', '', '', NULL, '2023-04-13', '2023-04-25'),
(12, '2023-7', 'avatar1.jpg', 'Dela Cruz', 'Juan', 'A', NULL, '2023-04-12', 23, 'Male', '5\'6', '65', 'sample', 'Filipino', 'Sample', 'Single', '09123456789', 'sadfdgfdgas23wqe3f@gmail.com', 'Sample', 'Sample', 'Sample', 'Sample', '5206', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '', 'BPA', 0, '3rd Year', NULL, 'none', '', '', '2023', '', '', '', '', '2023', '', '', '', '2023', '', '', '', '', '2023', '', '', '', '', NULL, '2023-04-13', '2023-04-25'),
(22, '2023-112112123234', NULL, 'Gobison', 'Marc Andrei', '', NULL, '2023-06-28', 1, 'Male', '175', '60', 'sasa', 'Filipino', 'sa', 'Single', '09455286162', 'marcandreiedwe.gobison@gmail.com', 'sa', 'Zone 1 Pola Oriental Mindoro', 'Pola', 'Manila', '5206', 'Marc Andrei Gobison', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '', 'BPA', 0, '1st Year', '1', NULL, '', '', '2023', '', '', '', '', '2023', '', '', '', '2023', '', '', '', '', '2023', '', '', '', '', NULL, '2020-06-01', NULL),
(23, '2023-0112', NULL, 'Gobison', 'Marc Andrei', '', NULL, '2000-07-28', 22, 'Male', '175', '60', 'Pola', 'Filipino', 'Catholic', 'Single', '09455286162', 'marcandrei.gobison@gmail.com', 'marcandrei.gobison@gmail.com', 'Zone 1 Pola Oriental Mindoro', 'Pola', 'Manila', '5206', '', 'Kristine', '', '', 'NONE', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', 'Pola', '', '', '', '0000-00-00', '', '', '', 'BSIT', 0, '1st Year', '1', NULL, 'MINSU', 'Calapan', '2023', 'Calapan', 'Oriental Mindoro', 'PCS', '', '2019', '', '', 'PCS', '2017', '', '', '', 'PCS', '2013', '', '', '', 'regular', '2023-06-03', '2023-06-03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students_grades`
--

CREATE TABLE `tbl_students_grades` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grades` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_subject_loads`
--

CREATE TABLE `tbl_student_subject_loads` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_code` varchar(45) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `grade` float(4,2) NOT NULL,
  `credit` int(4) DEFAULT NULL,
  `school_year` varchar(100) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_student_subject_loads`
--

INSERT INTO `tbl_student_subject_loads` (`id`, `subject_id`, `subject_code`, `student_id`, `grade`, `credit`, `school_year`, `date_created`, `date_updated`) VALUES
(193, 1, 'GENE01', 8, 0.00, 0, '2022-2023', '2023-04-13 13:24:48', NULL),
(194, 2, 'GENE02', 8, 0.00, 0, '2022-2023', '2023-04-13 13:24:48', NULL),
(195, 3, 'GENE03', 8, 0.00, 0, '2022-2023', '2023-04-13 13:24:48', NULL),
(196, 4, 'GENE04', 8, 0.00, 0, '2022-2023', '2023-04-13 13:24:48', NULL),
(197, 5, 'GENE05', 8, 0.00, 0, '2022-2023', '2023-04-13 13:24:48', NULL),
(198, 6, 'GENE06', 8, 0.00, 0, '2022-2023', '2023-04-13 13:24:48', NULL),
(199, 7, 'PHED01', 8, 0.00, 0, '2022-2023', '2023-04-13 13:24:48', NULL),
(200, 8, 'NSTP1', 8, 0.00, 0, '2022-2023', '2023-04-13 13:24:48', NULL),
(201, 9, 'GENE07', 8, 0.00, 0, '2022-2023', '2023-04-13 13:24:48', NULL),
(202, 10, 'GENE08', 8, 0.00, 0, '2022-2023', '2023-04-13 13:24:48', NULL),
(203, 11, 'GENE09', 8, 0.00, 0, '2022-2023', '2023-04-13 13:24:48', NULL),
(204, 15, 'GENE10', 8, 0.00, 0, '2022-2023', '2023-04-13 13:24:48', NULL),
(205, 16, 'GENE11', 8, 0.00, 0, '2022-2023', '2023-04-13 13:24:48', NULL),
(206, 17, 'PHED02', 8, 0.00, 0, '2022-2023', '2023-04-13 13:24:48', NULL),
(207, 19, 'NSTP02', 8, 0.00, 0, '2022-2023', '2023-04-13 13:24:48', NULL),
(233, 1, 'GENE01', 7, 90.75, 0, '2022-2023', '2023-04-17 11:09:39', NULL),
(234, 2, 'GENE02', 7, 90.00, 0, '2022-2023', '2023-04-17 11:09:39', NULL),
(235, 3, 'GENE03', 7, 90.00, 0, '2022-2023', '2023-04-17 11:09:39', NULL),
(236, 4, 'GENE04', 7, 90.00, 0, '2022-2023', '2023-04-17 11:09:39', NULL),
(237, 5, 'GENE05', 7, 90.00, 0, '2022-2023', '2023-04-17 11:09:39', NULL),
(238, 6, 'GENE06', 7, 90.00, 0, '2022-2023', '2023-04-17 11:09:39', NULL),
(239, 7, 'PHED01', 7, 90.00, 0, '2022-2023', '2023-04-17 11:09:39', NULL),
(240, 8, 'NSTP1', 7, 90.00, 0, '2022-2023', '2023-04-17 11:09:39', NULL),
(241, 20, 'RIZA01', 8, 89.00, 0, '2022-2023', '2023-04-17 11:46:58', NULL),
(242, 21, 'ENCO01', 8, 0.00, 0, '2022-2023', '2023-04-17 11:46:58', NULL),
(243, 22, 'ENCO02', 8, 0.00, 0, '2022-2023', '2023-04-17 11:46:58', NULL),
(244, 23, 'ENCO03', 8, 0.00, 0, '2022-2023', '2023-04-17 11:46:58', NULL),
(245, 24, 'ENCO04', 8, 0.00, 0, '2022-2023', '2023-04-17 11:46:58', NULL),
(246, 25, 'BACC01', 8, 0.00, 0, '2022-2023', '2023-04-17 11:46:58', NULL),
(247, 26, 'PHED03', 8, 0.00, 0, '2022-2023', '2023-04-17 11:46:58', NULL),
(255, 29, 'ENCO07', 8, 0.00, 0, '2022-2023', '2023-04-17 13:15:18', NULL),
(256, 30, 'ENTR01', 8, 0.00, 0, '2022-2023', '2023-04-17 13:15:18', NULL),
(257, 31, 'TECEN01', 8, 0.00, 0, '2022-2023', '2023-04-17 13:15:18', NULL),
(258, 32, 'FBAN01', 8, 0.00, 0, '2022-2023', '2023-04-17 13:15:18', NULL),
(259, 33, 'PHED04', 8, 0.00, 0, '2022-2023', '2023-04-17 13:15:18', NULL),
(279, 53, 'GENE01', 11, 0.00, 0, '2022-2023', '2023-04-17 14:42:10', NULL),
(280, 54, 'GENE02', 11, 0.00, 0, '2022-2023', '2023-04-17 14:42:10', NULL),
(281, 55, 'GENE03', 11, 0.00, 0, '2022-2023', '2023-04-17 14:42:10', NULL),
(282, 56, 'GENE04', 11, 0.00, 0, '2022-2023', '2023-04-17 14:42:10', NULL),
(283, 57, 'GENE05', 11, 0.00, 0, '2022-2023', '2023-04-17 14:42:10', NULL),
(284, 58, 'GENE06', 11, 0.00, 0, '2022-2023', '2023-04-17 14:42:10', NULL),
(285, 59, 'PHED01', 11, 0.00, 0, '2022-2023', '2023-04-17 14:42:10', NULL),
(286, 60, 'NSTP01', 11, 0.00, 0, '2022-2023', '2023-04-17 14:42:10', NULL),
(287, 61, 'GENE07', 11, 0.00, 0, '2022-2023', '2023-04-17 14:42:10', NULL),
(288, 62, 'GENE08', 11, 0.00, 0, '2022-2023', '2023-04-17 14:42:10', NULL),
(289, 63, 'GENE09', 11, 0.00, 0, '2022-2023', '2023-04-17 14:42:10', NULL),
(290, 64, 'GENE10', 11, 0.00, 0, '2022-2023', '2023-04-17 14:42:10', NULL),
(291, 65, 'GENE11', 11, 0.00, 0, '2022-2023', '2023-04-17 14:42:10', NULL),
(292, 66, 'PHED02', 11, 0.00, 0, '2022-2023', '2023-04-17 14:42:10', NULL),
(293, 67, 'NSTP02', 11, 0.00, 0, '2022-2023', '2023-04-17 14:42:10', NULL),
(294, 82, 'BPAM07', 12, 0.00, 0, '2022-2023', '2023-04-17 14:46:16', NULL),
(295, 83, 'BPAM08', 12, 0.00, 0, '2022-2023', '2023-04-17 14:46:16', NULL),
(296, 84, 'BPAM09', 12, 0.00, 0, '2022-2023', '2023-04-17 14:46:16', NULL),
(297, 85, 'BPAE01', 12, 0.00, 0, '2022-2023', '2023-04-17 14:46:16', NULL),
(298, 86, 'BPAE03', 12, 0.00, 0, '2022-2023', '2023-04-17 14:46:16', NULL),
(299, 87, 'BPAE05', 12, 0.00, 0, '2022-2023', '2023-04-17 14:46:16', NULL),
(300, 88, 'BPAM10', 12, 0.00, 0, '2022-2023', '2023-04-17 14:46:16', NULL),
(301, 89, 'BPAM11', 12, 0.00, 0, '2022-2023', '2023-04-17 14:46:16', NULL),
(302, 90, 'BPAM12', 12, 0.00, 0, '2022-2023', '2023-04-17 14:46:16', NULL),
(303, 91, 'BPAM13', 12, 0.00, 0, '2022-2023', '2023-04-17 14:46:16', NULL),
(304, 92, 'BPAE04', 12, 0.00, 0, '2022-2023', '2023-04-17 14:46:17', NULL),
(305, 93, 'BPAE06', 12, 0.00, 0, '2022-2023', '2023-04-17 14:46:17', NULL),
(320, 94, 'BPAM14', 10, 0.00, 0, '2022-2023', '2023-04-17 14:59:11', NULL),
(321, 97, 'BPAM15', 10, 0.00, 0, '2022-2023', '2023-04-17 14:59:11', NULL),
(322, 98, 'BPAM16', 10, 0.00, 0, '2022-2023', '2023-04-17 14:59:11', NULL),
(323, 99, 'BPAM17', 10, 0.00, 0, '2022-2023', '2023-04-17 14:59:11', NULL),
(324, 100, 'BPAE05', 10, 0.00, 0, '2022-2023', '2023-04-17 14:59:11', NULL),
(325, 101, 'BPAM18', 10, 0.00, 0, '2022-2023', '2023-04-17 14:59:11', NULL),
(326, 102, 'BPAM19', 10, 0.00, 0, '2022-2023', '2023-04-17 14:59:11', NULL),
(327, 103, 'BPAM20', 10, 0.00, 0, '2022-2023', '2023-04-17 14:59:11', NULL),
(344, 27, 'ENCO05', 8, 0.00, NULL, '2022-2023', '2023-04-25 15:40:15', NULL),
(345, 28, 'ENCO06', 8, 0.00, NULL, '2022-2023', '2023-04-25 15:40:15', NULL),
(360, 20, 'RIZA01', 7, 90.00, NULL, '2022-2023', '2023-04-25 15:42:13', NULL),
(361, 21, 'ENCO01', 7, 54.00, NULL, '2022-2023', '2023-04-25 15:42:13', NULL),
(362, 22, 'ENCO02', 7, 98.00, NULL, '2022-2023', '2023-04-25 15:42:13', NULL),
(363, 23, 'ENCO03', 7, 98.00, NULL, '2022-2023', '2023-04-25 15:42:13', NULL),
(364, 24, 'ENCO04', 7, 98.00, NULL, '2022-2023', '2023-04-25 15:42:13', NULL),
(365, 25, 'BACC01', 7, 89.00, NULL, '2022-2023', '2023-04-25 15:42:13', NULL),
(366, 26, 'PHED03', 7, 89.00, NULL, '2022-2023', '2023-04-25 15:42:13', NULL),
(367, 27, 'ENCO05', 7, 0.00, NULL, '2022-2023', '2023-05-09 09:34:52', NULL),
(368, 28, 'ENCO06', 7, 0.00, NULL, '2022-2023', '2023-05-09 09:34:52', NULL),
(369, 29, 'ENCO07', 7, 0.00, NULL, '2022-2023', '2023-05-09 09:34:52', NULL),
(370, 30, 'ENTR01', 7, 0.00, NULL, '2022-2023', '2023-05-09 09:34:52', NULL),
(371, 31, 'TECEN01', 7, 0.00, NULL, '2022-2023', '2023-05-09 09:34:52', NULL),
(372, 32, 'FBAN01', 7, 0.00, NULL, '2022-2023', '2023-05-09 09:34:52', NULL),
(373, 33, 'PHED04', 7, 0.00, NULL, '2022-2023', '2023-05-09 09:34:52', NULL),
(374, 9, 'GENE07', 7, 90.00, NULL, '2022-2023', '2023-05-09 09:37:18', NULL),
(375, 10, 'GENE08', 7, 90.00, NULL, '2022-2023', '2023-05-09 09:37:18', NULL),
(376, 11, 'GENE09', 7, 90.00, NULL, '2022-2023', '2023-05-09 09:37:18', NULL),
(377, 15, 'GENE10', 7, 90.00, NULL, '2022-2023', '2023-05-09 09:37:18', NULL),
(378, 16, 'GENE11', 7, 90.00, NULL, '2022-2023', '2023-05-09 09:37:18', NULL),
(379, 17, 'PHED02', 7, 90.00, NULL, '2022-2023', '2023-05-09 09:37:18', NULL),
(380, 19, 'NSTP02', 7, 90.00, NULL, '2022-2023', '2023-05-09 09:37:18', NULL),
(381, 34, 'ENCO08', 7, 0.00, NULL, '2022-2023', '2023-05-09 13:22:35', NULL),
(382, 35, 'ENCO09', 7, 0.00, NULL, '2022-2023', '2023-05-09 13:22:35', NULL),
(383, 36, 'CBME01', 7, 0.00, NULL, '2022-2023', '2023-05-09 13:22:35', NULL),
(384, 37, 'SPET01', 7, 0.00, NULL, '2022-2023', '2023-05-09 13:22:35', NULL),
(385, 38, 'ELEC01', 7, 0.00, NULL, '2022-2023', '2023-05-09 13:22:35', NULL),
(386, 39, 'ELEC02', 7, 0.00, NULL, '2022-2023', '2023-05-09 13:22:35', NULL),
(387, 40, 'ENTR02', 7, 0.00, NULL, '2022-2023', '2023-05-09 13:22:35', NULL),
(388, 41, 'SPET02', 7, 0.00, NULL, '2022-2023', '2023-05-09 13:22:35', NULL),
(389, 42, 'ELEC03', 7, 0.00, NULL, '2022-2023', '2023-05-09 13:22:35', NULL),
(390, 43, 'ELEC04', 7, 0.00, NULL, '2022-2023', '2023-05-09 13:22:35', NULL),
(391, 44, 'ENCO10', 7, 0.00, NULL, '2022-2023', '2023-05-09 13:22:35', NULL),
(392, 45, 'ENCO11', 7, 0.00, NULL, '2022-2023', '2023-05-09 13:22:35', NULL),
(393, 46, 'CBME02', 7, 0.00, NULL, '2022-2023', '2023-05-09 13:22:35', NULL),
(394, 47, 'ENCO12', 7, 80.00, NULL, '2022-2023', '2023-05-09 13:28:04', NULL),
(395, 48, 'ENCO13', 7, 90.00, NULL, '2022-2023', '2023-05-09 13:28:04', NULL),
(396, 49, 'SPET03', 7, 89.00, NULL, '2022-2023', '2023-05-09 13:28:04', NULL),
(397, 50, 'ENCO14', 7, 80.00, NULL, '2022-2023', '2023-05-09 13:28:04', NULL),
(398, 51, 'ENCO15', 7, 78.00, NULL, '2022-2023', '2023-05-09 13:28:04', NULL),
(399, 52, 'SPET04', 7, 89.00, NULL, '2022-2023', '2023-05-09 13:28:04', NULL),
(434, 1, 'GENE01', 6, 0.00, NULL, '2022-2023', '2023-06-03 12:37:10', NULL),
(435, 2, 'GENE02', 6, 0.00, NULL, '2022-2023', '2023-06-03 12:37:10', NULL),
(436, 3, 'GENE03', 6, 0.00, NULL, '2022-2023', '2023-06-03 12:37:10', NULL),
(437, 4, 'GENE04', 6, 0.00, NULL, '2022-2023', '2023-06-03 12:37:10', NULL),
(438, 5, 'GENE05', 6, 0.00, NULL, '2022-2023', '2023-06-03 12:37:10', NULL),
(439, 6, 'GENE06', 6, 0.00, NULL, '2022-2023', '2023-06-03 12:37:10', NULL),
(440, 7, 'PHED01', 6, 0.00, NULL, '2022-2023', '2023-06-03 12:37:10', NULL),
(441, 8, 'NSTP1', 6, 0.00, NULL, '2022-2023', '2023-06-03 12:37:10', NULL),
(442, 9, 'GENE07', 6, 0.00, NULL, '2022-2023', '2023-06-03 12:37:10', NULL),
(443, 10, 'GENE08', 6, 0.00, NULL, '2022-2023', '2023-06-03 12:37:10', NULL),
(444, 11, 'GENE09', 6, 0.00, NULL, '2022-2023', '2023-06-03 12:37:10', NULL),
(445, 15, 'GENE10', 6, 0.00, NULL, '2022-2023', '2023-06-03 12:37:10', NULL),
(446, 16, 'GENE11', 6, 0.00, NULL, '2022-2023', '2023-06-03 12:37:10', NULL),
(447, 17, 'PHED02', 6, 0.00, NULL, '2022-2023', '2023-06-03 12:37:10', NULL),
(448, 19, 'NSTP02', 6, 0.00, NULL, '2022-2023', '2023-06-03 12:37:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `id` int(11) NOT NULL,
  `subcode` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `units` int(11) DEFAULT NULL,
  `prereq` varchar(100) DEFAULT 'none',
  `year_level` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `program_id` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`id`, `subcode`, `description`, `units`, `prereq`, `year_level`, `semester`, `program_id`, `date_created`, `date_updated`) VALUES
(1, 'GENE01', 'Purposive Communication ', 3, 'none', 1, 1, 1, NULL, '2023-03-27 09:21:15'),
(2, 'GENE02', 'Mathematics in the Modern World', 3, 'none', 1, 1, 1, NULL, NULL),
(3, 'GENE03', 'Art Apreciation', 3, 'none', 1, 1, 1, NULL, '2023-03-29 04:45:43'),
(4, 'GENE04', 'Understanding the Self', 3, 'none', 1, 1, 1, NULL, NULL),
(5, 'GENE05', 'Readings in the Philippine History', 3, 'none', 1, 1, 1, NULL, NULL),
(6, 'GENE06', 'Ethics', 3, 'none', 1, 1, 1, NULL, '2023-03-29 07:35:22'),
(7, 'PHED01', 'Self-Testing Acivities', 2, 'none', 1, 1, 1, NULL, '2023-03-28 09:10:39'),
(8, 'NSTP1', 'Civic Welfare Training Service 1', 3, 'none', 1, 1, 1, NULL, NULL),
(9, 'GENE07', 'The Contemporary World', 3, 'none', 1, 2, 1, '2023-03-24 00:00:00', NULL),
(10, 'GENE08', 'Science, Technology and Society', 3, 'none', 1, 2, 1, '2023-03-24 00:00:00', NULL),
(11, 'GENE09', 'People and the Earth\'s Ecosystem', 3, 'none', 1, 2, 1, '2023-03-24 00:00:00', NULL),
(15, 'GENE10', 'Gender and Society', 3, 'none', 1, 2, 1, '2023-03-24 00:00:00', NULL),
(16, 'GENE11', 'Information Technology (IT) in the New Era', 3, 'none', 1, 2, 1, '2023-03-24 00:00:00', '2023-03-24 00:00:00'),
(17, 'PHED02', 'Rhythmic Activities', 3, 'PHED01', 1, 2, 1, '2023-03-24 11:58:37', '2023-03-29 02:50:25'),
(19, 'NSTP02', 'Civic Welfare Training Service 2', 3, 'NSTP1', 1, 2, 1, '2023-03-27 13:46:28', '2023-03-29 02:49:56'),
(20, 'RIZA01', 'Rizal\'s Life and Works', 3, 'none', 2, 1, 1, '2023-03-27 13:49:04', '2023-03-27 13:49:04'),
(21, 'ENCO01', 'Entrepreneurial Behavior and Mindset', 3, 'none', 2, 1, 1, '2023-03-27 09:01:43', '2023-03-27 09:21:32'),
(22, 'ENCO02', 'Microeconomics', 3, 'none', 2, 1, 1, '2023-03-27 09:18:22', '2023-03-27 09:21:36'),
(23, 'ENCO03', 'Opportunity Seeking', 3, 'ENCO01', 2, 1, 1, '2023-03-27 09:23:38', '2023-03-29 02:51:34'),
(24, 'ENCO04', 'Market Research and Consumer Behavior', 3, 'ENCO01', 2, 1, 1, '2023-03-27 09:24:11', '2023-03-29 04:18:52'),
(25, 'BACC01', 'Fundamentals of Accounting', 6, 'none', 2, 1, 1, '2023-03-27 09:24:56', '2023-03-27 15:24:56'),
(26, 'PHED03', 'Fundamentals of Games and Sports', 2, 'PHED02', 2, 1, 1, '2023-03-27 09:26:23', '2023-03-29 02:50:48'),
(27, 'ENCO05', 'Innovation Management', 3, 'ENCO01', 2, 2, 1, '2023-03-27 09:43:42', '2023-03-29 02:51:47'),
(28, 'ENCO06', 'Pricing and Costing', 3, 'BACC01', 2, 2, 1, '2023-03-27 09:44:17', '2023-03-29 02:52:12'),
(29, 'ENCO07', 'Human Resource Management', 3, 'ENCO01', 2, 2, 1, '2023-03-27 09:45:04', '2023-03-29 05:48:24'),
(30, 'ENTR01', 'Human Behavior inOrganization', 3, 'none', 2, 2, 1, '2023-03-27 10:16:31', '2023-03-29 03:57:43'),
(31, 'TECEN01', 'Fundamentals of Technopreneurship', 3, 'ENCO03', 2, 2, 1, '2023-03-27 10:17:13', '2023-03-29 02:53:12'),
(32, 'FBAN01', 'Fundmentals of Business Analytics', 3, 'none', 2, 2, 1, '2023-03-27 10:18:24', '2023-03-29 05:49:20'),
(33, 'PHED04', 'Recreational Activities for College Students', 2, 'PHED03', 2, 2, 1, '2023-03-27 10:19:01', '2023-03-29 04:04:00'),
(34, 'ENCO08', 'Financial Management', 3, 'BACC01', 3, 1, 1, '2023-03-27 10:20:36', '2023-03-29 04:04:37'),
(35, 'ENCO09', 'Business Plan Preparation', 3, 'ENCO03', 3, 1, 1, '2023-03-27 10:21:26', '2023-03-29 04:04:49'),
(36, 'CBME01', 'Production and Operations Management (TQM)', 3, 'TECEN01', 3, 1, 1, '2023-03-27 10:22:23', '2023-03-29 04:05:03'),
(37, 'SPET01', 'Hospitality Management', 3, 'ENCO03', 3, 1, 1, '2023-03-27 10:22:48', '2023-03-29 04:05:28'),
(38, 'ELEC01', 'Entrepreneurial Leadership in Organization', 3, 'ENTR01', 3, 1, 1, '2023-03-27 10:23:28', '2023-03-29 10:02:54'),
(39, 'ELEC02', 'Entrepreneurial Marketing  Strategies', 3, 'ENCO03', 3, 1, 1, '2023-03-27 10:24:08', '2023-03-29 04:05:48'),
(40, 'ENTR02', 'Principles in Crop Production', 3, 'none', 3, 1, 1, '2023-03-27 10:25:00', '2023-03-29 03:58:04'),
(41, 'SPET02', 'Convention and Meeting Management', 3, 'ENCO03', 3, 2, 1, '2023-03-27 10:37:51', '2023-03-29 04:17:57'),
(42, 'ELEC03', 'E-Commerce', 3, 'TECEN01', 3, 2, 1, '2023-03-27 10:38:29', '2023-03-29 04:18:06'),
(43, 'ELEC04', 'Agribusiness', 3, 'ENCO03', 3, 2, 1, '2023-03-27 10:39:03', '2023-03-29 04:18:19'),
(44, 'ENCO10', 'International Business and Trade', 3, 'ENCO04', 3, 2, 1, '2023-03-27 10:39:39', '2023-03-29 04:20:39'),
(45, 'ENCO11', 'Business Law and Taxation', 3, 'ENCO08', 3, 2, 1, '2023-03-27 10:40:24', '2023-03-29 04:20:49'),
(46, 'CBME02', 'Strategic Management', 3, 'CBME01', 3, 2, 1, '2023-03-27 10:41:22', '2023-03-29 04:21:04'),
(47, 'ENCO12', 'Business Plan Implementation I', 5, 'ENCO09', 4, 1, 1, '2023-03-27 10:42:10', '2023-03-29 04:21:16'),
(48, 'ENCO13', 'Social Entrepreneurship', 3, 'GENE07', 4, 1, 1, '2023-03-27 10:42:41', '2023-03-29 04:21:37'),
(49, 'SPET03', 'Events Management', 3, 'ENCO03', 4, 1, 1, '2023-03-27 10:43:21', '2023-03-29 04:21:44'),
(50, 'ENCO14', 'Business Plan Implementation 2', 5, 'ENCO12', 4, 2, 1, '2023-03-27 10:44:08', '2023-03-29 04:21:51'),
(51, 'ENCO15', 'Programs Policies on Enterprise Development', 3, 'ENCO09', 4, 2, 1, '2023-03-27 10:44:44', '2023-03-29 04:22:00'),
(52, 'SPET04', 'Wholesale and Retail Management', 3, 'ENCO03', 4, 2, 1, '2023-03-27 10:45:12', '2023-03-29 04:22:07'),
(53, 'GENE01', 'Purposive Communication ', 3, 'none', 1, 1, 2, '2023-03-29 05:02:34', '2023-03-29 11:02:34'),
(54, 'GENE02', 'Mathematics in the Modern World', 3, 'none', 1, 1, 2, '2023-03-29 05:03:34', '2023-03-29 05:05:42'),
(55, 'GENE03', 'Arts Appreciation', 3, 'none', 1, 1, 2, '2023-03-29 05:19:03', '2023-03-29 11:19:03'),
(56, 'GENE04', 'Understanding the Self', 3, 'none', 1, 1, 2, '2023-03-29 05:20:03', '2023-03-29 11:20:03'),
(57, 'GENE05', 'Readings in Philippine History', 3, 'none', 1, 1, 2, '2023-03-29 05:21:27', '2023-03-29 11:21:27'),
(58, 'GENE06', 'Ethics', 3, 'none', 1, 1, 2, '2023-03-29 05:22:46', '2023-03-29 11:22:46'),
(59, 'PHED01', 'Self Testing Activities', 2, 'none', 1, 1, 2, '2023-03-29 05:23:47', '2023-03-29 11:23:47'),
(60, 'NSTP01', 'CWS/MS 11', 3, 'none', 1, 1, 2, '2023-03-29 05:24:55', '2023-03-29 11:24:55'),
(61, 'GENE07', 'The Contemporary World', 3, 'none', 1, 2, 2, '2023-03-29 05:26:36', '2023-03-29 11:26:36'),
(62, 'GENE08', 'Science, Technology and Society', 3, 'none', 1, 2, 2, '2023-03-29 05:27:34', '2023-03-29 11:27:34'),
(63, 'GENE09', 'Philippine Government and Constitution ', 3, 'none', 1, 2, 2, '2023-03-29 05:28:48', '2023-03-29 11:28:48'),
(64, 'GENE10', 'Gender and Society', 3, 'none', 1, 2, 2, '2023-03-29 05:29:32', '2023-03-29 11:29:32'),
(65, 'GENE11', 'Information Technology(IT) in the New Era', 3, 'none', 1, 2, 2, '2023-03-29 05:30:28', '2023-03-29 11:30:28'),
(66, 'PHED02', 'Rhythmic Activities', 2, 'PHED01', 1, 2, 2, '2023-03-29 05:31:37', '2023-03-29 10:29:49'),
(67, 'NSTP02', 'CWS/MS 12', 3, 'NSTP1', 1, 2, 2, '2023-03-29 05:32:11', '2023-03-29 10:29:54'),
(68, 'BPAM01', 'Introduction to Public Administration', 3, 'none', 2, 1, 2, '2023-03-29 05:34:04', '2023-03-29 11:34:04'),
(69, 'GENE12', 'Entrepreneurial Behavior and Mindset', 3, 'none', 2, 1, 2, '2023-03-29 05:34:47', '2023-03-29 11:34:47'),
(70, 'BPAM02', 'Philippine Administrative Thought and Institutions', 3, 'BPAM01', 2, 1, 2, '2023-03-29 05:35:53', '2023-03-29 10:30:08'),
(71, 'BPAC01', 'Basic Accounting', 3, 'BPAC01', 2, 1, 2, '2023-03-29 05:37:24', '2023-03-29 10:31:02'),
(72, 'BPAC02', 'Elementary Statistics', 3, 'BPAC01', 2, 1, 2, '2023-03-29 05:37:59', '2023-03-29 10:30:46'),
(73, 'RIZA01', 'Rizal\'s Life and Works', 3, 'none', 2, 1, 2, '2023-03-29 05:38:55', '2023-03-29 11:38:55'),
(74, 'PHED03', 'Fundamental of Games and Sports', 3, 'PHED02', 2, 1, 2, '2023-03-29 05:39:40', '2023-03-29 10:31:12'),
(75, 'BPAC03', 'Good Governance and and Social Responsibility', 3, 'BPAC01', 2, 2, 2, '2023-03-29 05:40:47', '2023-03-29 10:31:22'),
(76, 'BPAC04', 'Sociology', 3, 'BPAC01', 2, 2, 2, '2023-03-29 05:41:14', '2023-03-29 10:31:26'),
(77, 'BPAM03', 'Ethics and Accountability in the Public Service', 3, 'BPAM01', 2, 2, 2, '2023-03-29 05:42:37', '2023-03-29 10:32:24'),
(78, 'BPAM04', 'Governance and Development', 3, 'BPAM01', 2, 2, 2, '2023-03-29 05:43:29', '2023-03-29 10:32:28'),
(79, 'BPAM05', 'Office and Systems Management', 3, 'BPAM01', 2, 2, 2, '2023-03-29 05:44:40', '2023-03-29 10:32:35'),
(80, 'BPAM06', 'Knowledge Management and ICT for PA', 3, 'BPAM01', 2, 2, 2, '2023-03-29 05:45:36', '2023-03-29 10:32:19'),
(81, 'PHED04', 'Recreational Activities for College Students', 2, 'PHED03', 2, 2, 2, '2023-03-29 05:46:50', '2023-03-29 10:32:07'),
(82, 'BPAM07', 'Public Accounting and Budgeting', 3, 'BPAM01', 3, 1, 2, '2023-03-29 10:07:59', '2023-03-29 10:33:07'),
(83, 'BPAM08', 'Local and Regional Governance', 3, 'BPAM01', 3, 1, 2, '2023-03-29 10:09:16', '2023-03-29 10:33:16'),
(84, 'BPAM09', 'Public Personnel Administration', 3, 'BPAM01', 3, 1, 2, '2023-03-29 10:10:08', '2023-03-29 10:33:22'),
(85, 'BPAE01', 'Policy Analysis', 3, 'BPAC01', 3, 1, 2, '2023-03-29 10:10:50', '2023-04-17 08:45:36'),
(86, 'BPAE03', 'Records and Property Management', 3, 'BPAM01', 3, 1, 2, '2023-03-29 10:12:01', '2023-03-29 10:33:35'),
(87, 'BPAE05', 'Government Auditing ', 3, 'BPAM01', 3, 1, 2, '2023-03-29 10:12:50', '2023-03-29 10:33:43'),
(88, 'BPAM10', 'Human Behavior and Organization', 3, 'BPAM01', 3, 2, 2, '2023-03-29 10:15:17', '2023-03-29 10:34:01'),
(89, 'BPAM11', 'Organization and Management', 3, 'BPAM01', 3, 2, 2, '2023-03-29 10:16:16', '2023-03-29 10:34:28'),
(90, 'BPAM12', 'Public Fiscal Administration', 3, 'BPAM01', 3, 2, 2, '2023-03-29 10:17:03', '2023-03-29 10:34:45'),
(91, 'BPAM13', 'Administrative Law', 3, 'BPAM01', 3, 2, 2, '2023-03-29 10:17:33', '2023-03-29 10:35:08'),
(92, 'BPAE04', 'Program Administration (implementation)', 3, 'BPAM01', 3, 2, 2, '2023-03-29 10:18:15', '2023-03-29 10:35:23'),
(93, 'BPAE06', 'Environmental Management', 3, 'none', 3, 2, 2, '2023-03-29 10:18:59', '2023-03-29 16:18:59'),
(94, 'BPAM14', 'Research Method in PA 1', 3, 'BPAM01', 4, 1, 2, '2023-03-29 10:20:56', '2023-03-29 10:35:37'),
(97, 'BPAM15', 'Public Policy and Program Administration', 3, 'BPAM01', 4, 1, 2, '2023-03-29 10:22:31', '2023-03-29 10:35:45'),
(98, 'BPAM16', 'Politics and Administration', 3, 'BPAM01', 4, 1, 2, '2023-03-29 10:23:23', '2023-03-29 10:35:54'),
(99, 'BPAM17', 'Special Topics/ Problem for PA', 3, 'BPAM01', 4, 1, 2, '2023-03-29 10:23:58', '2023-03-29 10:36:00'),
(100, 'BPAE05', 'Globalization & Public Administration', 3, 'BPAM01', 4, 1, 2, '2023-03-29 10:24:59', '2023-03-29 10:36:05'),
(101, 'BPAM18', 'Leadership and Decision Making', 3, 'BPAM01', 4, 2, 2, '2023-03-29 10:25:40', '2023-03-29 10:36:11'),
(102, 'BPAM19', 'Research Methods in PA 2', 3, 'BPAM01', 4, 2, 2, '2023-03-29 10:26:17', '2023-03-29 10:36:17'),
(103, 'BPAM20', 'PA Practicum', 6, 'none', 4, 2, 2, '2023-03-29 10:26:43', '2023-03-29 16:26:43'),
(104, 'BSIT', 'BSIT', 3, 'none', 1, 1, 3, '2023-06-03 23:14:29', '2023-06-03 23:14:29'),
(105, 'SMLIT01', 'SAMPLE SUBJECT IT', 3, 'none', 1, 1, 3, '2023-06-04 12:58:53', '2023-06-04 18:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject_prereq`
--

CREATE TABLE `tbl_subject_prereq` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `prereq_subject_id` int(11) NOT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subject_prereq`
--

INSERT INTO `tbl_subject_prereq` (`id`, `subject_id`, `prereq_subject_id`, `date_created`, `date_updated`) VALUES
(4, 19, 8, '2023-03-28 11:32:23', NULL),
(6, 17, 7, '2023-03-28 09:20:12', NULL),
(14, 26, 0, '2023-03-28 09:52:05', '2023-03-28 10:46:20'),
(15, 23, 21, '2023-03-28 10:15:29', NULL),
(17, 26, 17, '2023-03-29 01:59:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teachers`
--

CREATE TABLE `tbl_teachers` (
  `id` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_teachers`
--

INSERT INTO `tbl_teachers` (`id`, `lname`, `mname`, `fname`, `email`, `created_at`, `updated_at`) VALUES
(1, 'teacher', 'teacher', 'teacher', 'teacher@teacher.com', '2023-02-25 12:44:07', '2023-02-25 12:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_loads`
--

CREATE TABLE `tbl_teacher_loads` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_teacher_loads`
--

INSERT INTO `tbl_teacher_loads` (`id`, `teacher_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2023-02-25 12:44:53', '2023-02-25 12:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year_level`
--

CREATE TABLE `tbl_year_level` (
  `id` int(11) NOT NULL,
  `year` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_year_level`
--

INSERT INTO `tbl_year_level` (`id`, `year`, `created_at`, `updated_at`) VALUES
(1, '1st Year', '2023-02-26 19:09:51', '2023-02-26 19:09:51'),
(2, '2nd Year', '2023-02-26 19:09:51', '2023-02-26 19:09:51'),
(3, '3rd Year', '2023-02-26 19:09:51', '2023-02-26 19:09:51'),
(4, '4th Year', '2023-02-26 19:09:51', '2023-02-26 19:09:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sample_data`
--
ALTER TABLE `sample_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_announcements`
--
ALTER TABLE `tbl_announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog_setting`
--
ALTER TABLE `tbl_blog_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment_filter_dict`
--
ALTER TABLE `tbl_comment_filter_dict`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_links`
--
ALTER TABLE `tbl_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_program`
--
ALTER TABLE `tbl_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_school_year`
--
ALTER TABLE `tbl_school_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_signatory`
--
ALTER TABLE `tbl_signatory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_students_grades`
--
ALTER TABLE `tbl_students_grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `tbl_students_grades_ibfk_2` (`subject_id`);

--
-- Indexes for table `tbl_student_subject_loads`
--
ALTER TABLE `tbl_student_subject_loads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`) USING BTREE;

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `tbl_subject_prereq`
--
ALTER TABLE `tbl_subject_prereq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prereq_subject_id` (`prereq_subject_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `tbl_teachers`
--
ALTER TABLE `tbl_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_teacher_loads`
--
ALTER TABLE `tbl_teacher_loads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_teacher_loads_ibfk_1` (`teacher_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `tbl_year_level`
--
ALTER TABLE `tbl_year_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sample_data`
--
ALTER TABLE `sample_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_announcements`
--
ALTER TABLE `tbl_announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `tbl_blog_setting`
--
ALTER TABLE `tbl_blog_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_comment_filter_dict`
--
ALTER TABLE `tbl_comment_filter_dict`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `tbl_program`
--
ALTER TABLE `tbl_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_school_year`
--
ALTER TABLE `tbl_school_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_signatory`
--
ALTER TABLE `tbl_signatory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_students_grades`
--
ALTER TABLE `tbl_students_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_student_subject_loads`
--
ALTER TABLE `tbl_student_subject_loads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=450;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tbl_subject_prereq`
--
ALTER TABLE `tbl_subject_prereq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_teachers`
--
ALTER TABLE `tbl_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_students_grades`
--
ALTER TABLE `tbl_students_grades`
  ADD CONSTRAINT `tbl_students_grades_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `tbl_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_students_grades_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `tbl_subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_student_subject_loads`
--
ALTER TABLE `tbl_student_subject_loads`
  ADD CONSTRAINT `tbl_student_subject_loads_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `tbl_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_student_subject_loads_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `tbl_subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD CONSTRAINT `tbl_subject_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `tbl_course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
