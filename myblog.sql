-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-08-15 11:07:23
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- 表的结构 `fc_albumphoto`
--

CREATE TABLE IF NOT EXISTS `fc_albumphoto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img_path` varchar(255) NOT NULL COMMENT '图片地址',
  `thumb` varchar(255) NOT NULL COMMENT '缩略图地址',
  `img_content` text COMMENT '图片介绍',
  `img_time` int(11) unsigned NOT NULL COMMENT '图片上传时间',
  `imgcid` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '所属相册',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=278 ;

--
-- 转存表中的数据 `fc_albumphoto`
--

INSERT INTO `fc_albumphoto` (`id`, `img_path`, `thumb`, `img_content`, `img_time`, `imgcid`) VALUES
(272, '/Uploads/20160812/57ad8ba6e6a2f.jpg', 'Public/thumb/57ad8ba6e6a2f.jpg', NULL, 1470991271, 20),
(273, '/Uploads/20160812/57ad8ba71b840.jpg', 'Public/thumb/57ad8ba71b840.jpg', NULL, 1470991271, 20),
(274, '/Uploads/20160812/57ad8ba753ac7.jpg', 'Public/thumb/57ad8ba753ac7.jpg', NULL, 1470991271, 20),
(275, '/Uploads/20160812/57ad8ba789e0d.jpg', 'Public/thumb/57ad8ba789e0d.jpg', NULL, 1470991271, 20),
(276, '/Uploads/20160812/57ad8ba7b7c80.jpg', 'Public/thumb/57ad8ba7b7c80.jpg', NULL, 1470991271, 20),
(277, '/Uploads/20160812/57ad8ba7e2ffa.jpg', 'Public/thumb/57ad8ba7e2ffa.jpg', NULL, 1470991272, 20);

-- --------------------------------------------------------

--
-- 表的结构 `fc_attr`
--

CREATE TABLE IF NOT EXISTS `fc_attr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(10) NOT NULL DEFAULT '',
  `color` char(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `fc_attr`
--

INSERT INTO `fc_attr` (`id`, `name`, `color`) VALUES
(1, '置顶', '#f00f00'),
(2, '推荐', 'green'),
(3, '精华', 'blue');

-- --------------------------------------------------------

--
-- 表的结构 `fc_blog`
--

CREATE TABLE IF NOT EXISTS `fc_blog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '博文自增id',
  `title` varchar(30) NOT NULL DEFAULT '' COMMENT '博文标题',
  `content` text NOT NULL COMMENT '博文内容',
  `summary` varchar(255) NOT NULL DEFAULT '' COMMENT '摘要',
  `blogauther` varchar(30) NOT NULL COMMENT '作者',
  `tags` varchar(30) DEFAULT NULL COMMENT '标签',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发布时间',
  `click` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '点击量',
  `cid` int(10) unsigned NOT NULL COMMENT '所属分类',
  `del` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除到回收站',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- 转存表中的数据 `fc_blog`
--

INSERT INTO `fc_blog` (`id`, `title`, `content`, `summary`, `blogauther`, `tags`, `time`, `click`, `cid`, `del`) VALUES
(12, '我的生活', '所得税的发送到发送到', '所得税的发送到发送到', '流年', '生活', 1465954943, 1075, 32, 1),
(15, '大悲咒', '<p><br/></p>这种方式虽然能快速实现数据统计系统，但在经过ATMServer多次优化（参考发哥server优化分享）后， 发现几个问题：<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1.&nbsp;依赖传输网络质量，如果传输网络抖动会造成数据的丢失；网络正常情况下，高峰时刻数据丢失率可能达到千分之一</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2.&nbsp;数据回溯计算困难</p><p>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;这种丢包，到底能不能忍受？要看场景</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;对于趋势性的统计，影响不大。例如目前ATM部分告警依然沿用这种方式（最新的已经切换到protobuf协议传输），因为更看重数据的及时性，告警问题且多为并发，丢失少量数据并不会影响告警的核心作用。</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;而对于用户参与数，礼包发放量等统计，对活动的判断影响较大，需要做到一个不差。ATM之前采取一种做法：当天的数据通过实时数据展示，第二天就通过日志计算的精确数据展示，既可以满足实时性也可以近似满足准确性要求。&nbsp;&nbsp;因为当天的准确性始终还是存在一定的误差，在某些对于数据严格要求的场景下受到挑战，所以又继续改进，实现了分钟级的准实时数据，几乎没有误差。</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;具体传输是怎么实现的呢？</p><p><br/></p>', '这种方式虽然能快速实现数据统计系统，但在经过ATMServer多次优化（参考发哥server优化分享）后， 发现几个问题：       1. 依赖传输网络质量，如果传输网络抖动会造成数据的丢失；网络正...', '流年', '大悲咒', 1465960408, 129, 32, 0),
(21, '将发新系统的微软要如何做“反盗版”先锋？ ', '<pre class="brush:php;toolbar:false;">where(array(&#39;pid&#39;=&gt;0))-&gt;order(&#39;sort&#39;)-&gt;select();\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;import(&#39;Class.Category&#39;,&nbsp;APP_PATH);\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$Category&nbsp;=&nbsp;new&nbsp;\\Category();\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$cate&nbsp;=M(&#39;cate&#39;)-&gt;order(&#39;sort&#39;)-&gt;select();\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$db&nbsp;=&nbsp;M(&#39;blog&#39;);\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$field&nbsp;=&nbsp;array(&#39;id&#39;,&#39;title&#39;,&#39;time&#39;);//需要读取的字段\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;foreach&nbsp;($list&nbsp;as&nbsp;$k&nbsp;=&gt;&nbsp;$v){\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$cids&nbsp;=&nbsp;$Category::getChildsId($cate,$v[&#39;id&#39;]);\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$cids[]&nbsp;=&nbsp;$v[&#39;id&#39;];\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$where&nbsp;=&nbsp;array(&#39;cid&#39;&nbsp;=&gt;&nbsp;array(&#39;IN&#39;,$cids));\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$list[$k][&#39;blog&#39;]&nbsp;=&nbsp;$db-&gt;field($field)-&gt;where($where)-&gt;order(&#39;time&nbsp;DESC&#39;)-&gt;select();\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//缓存&nbsp;&nbsp;缓存名称index_list&nbsp;&nbsp;缓存数据$list&nbsp;缓存时间10秒\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S(&#39;index_list&#39;,$list,10);\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;cate=$list;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;display();\r\n&nbsp;&nbsp;&nbsp;&nbsp;}\r\n}</pre><p><br/></p>', 'where(array(''pid''=>0))->order(''sort'')->select();\r\n\r\n            import(''Class.Category'', APP_PATH);\r...', '流年', '反盗版', 1465961861, 189, 35, 0),
(33, '自行车都智能化了，你可知道它的历史？', '<br/><p>&nbsp;&nbsp; 在不少旁观者的眼里，智能化几乎成了一种避之唯恐不及的“瘟疫”，开始攀附上大大小小、各式各样的工具和设备，从水杯、灯泡、体重秤这样的小物件，再到冰箱、洗衣机这些生活中的庞然大物。</p><p>兜兜转转之后，这场“瘟疫”又找上了在生活中不那么起眼的自行车。然而，在搭上智能化的顺风车之前，你可知道自行车的历史？虽然，在乐视超级自行车的发布\r\n会上，它已经用了自行车史上有着重要地位的三个名字——斯塔利、西夫拉克、阿尔普迪埃——来命名自家的自行车，但那远远不够。Gizmodo \r\n为我们梳理了自行车发展的关键节点。</p><p>在开始之前，我们先来看看丹麦的设计师制作的动画，一分钟看完自行车近 200 年的演变。</p><p>比较公认的说法是，第一辆自行车由法国手工艺人西夫拉克（Médé de \r\nSivrac）设计，在两个轮子上安装了支架并配上马鞍，前进的话需要用脚蹬地提供动力。这还只是一个很简单的雏形，没有方向舵，转弯的时候需要骑行者下\r\n车抬起前轮，稳定性也不好。</p><p>德国人杜莱斯（Karl Drais von \r\nSauerbronn）制作了一辆和西夫拉克的设计相近的两轮车子，增加了车把，可以改变行进中的方向，速度可以达到 \r\n15km/h。不过，还是需要靠双脚蹬地提供动力。</p><p>这时候第一辆真正意义上的自行车诞生了，是由苏格兰铁匠麦克米伦（Kirkpatrik Macmillan）设计的，它还有一个专门的名字——Velocipede。</p><p>在不少旁观者的眼里，智能化几乎成了一种避之唯恐不及的“瘟疫”，开始攀附上大大小小、各式各样的工具和设备，从水杯、灯泡、体重秤这样的小物件，再到冰箱、洗衣机这些生活中的庞然大物。</p><p>兜兜转转之后，这场“瘟疫”又找上了在生活中不那么起眼的自行车。然而，在搭上智能化的顺风车之前，你可知道自行车的历史？虽然，在乐视超级自行车的发布\r\n会上，它已经用了自行车史上有着重要地位的三个名字——斯塔利、西夫拉克、阿尔普迪埃——来命名自家的自行车，但那远远不够。Gizmodo \r\n为我们梳理了自行车发展的关键节点。</p><p>在开始之前，我们先来看看丹麦的设计师制作的动画，一分钟看完自行车近 200 年的演变。</p><p>比较公认的说法是，第一辆自行车由法国手工艺人西夫拉克（Médé de \r\nSivrac）设计，在两个轮子上安装了支架并配上马鞍，前进的话需要用脚蹬地提供动力。这还只是一个很简单的雏形，没有方向舵，转弯的时候需要骑行者下\r\n车抬起前轮，稳定性也不好。</p><p>德国人杜莱斯（Karl Drais von \r\nSauerbronn）制作了一辆和西夫拉克的设计相近的两轮车子，增加了车把，可以改变行进中的方向，速度可以达到 \r\n15km/h。不过，还是需要靠双脚蹬地提供动力。</p><p>这时候第一辆真正意义上的自行车诞生了，是由苏格兰铁匠麦克米伦（Kirkpatrik Macmillan）设计的，它还有一个专门的名字——Velocipede。</p><p>在不少旁观者的眼里，智能化几乎成了一种避之唯恐不及的“瘟疫”，开始攀附上大大小小、各式各样的工具和设备，从水杯、灯泡、体重秤这样的小物件，再到冰箱、洗衣机这些生活中的庞然大物。</p><p>兜兜转转之后，这场“瘟疫”又找上了在生活中不那么起眼的自行车。然而，在搭上智能化的顺风车之前，你可知道自行车的历史？虽然，在乐视超级自行车的发布\r\n会上，它已经用了自行车史上有着重要地位的三个名字——斯塔利、西夫拉克、阿尔普迪埃——来命名自家的自行车，但那远远不够。Gizmodo \r\n为我们梳理了自行车发展的关键节点。</p><p>在开始之前，我们先来看看丹麦的设计师制作的动画，一分钟看完自行车近 200 年的演变。</p><p>比较公认的说法是，第一辆自行车由法国手工艺人西夫拉克（Médé de \r\nSivrac）设计，在两个轮子上安装了支架并配上马鞍，前进的话需要用脚蹬地提供动力。这还只是一个很简单的雏形，没有方向舵，转弯的时候需要骑行者下\r\n车抬起前轮，稳定性也不好。</p><p>德国人杜莱斯（Karl Drais von \r\nSauerbronn）制作了一辆和西夫拉克的设计相近的两轮车子，增加了车把，可以改变行进中的方向，速度可以达到 \r\n15km/h。不过，还是需要靠双脚蹬地提供动力。</p><p>这时候第一辆真正意义上的自行车诞生了，是由苏格兰铁匠麦克米伦（Kirkpatrik Macmillan）设计的，它还有一个专门的名字——Velocipede。</p><p>在不少旁观者的眼里，智能化几乎成了一种避之唯恐不及的“瘟疫”，开始攀附上大大小小、各式各样的工具和设备，从水杯、灯泡、体重秤这样的小物件，再到冰箱、洗衣机这些生活中的庞然大物。</p><p>兜兜转转之后，这场“瘟疫”又找上了在生活中不那么起眼的自行车。然而，在搭上智能化的顺风车之前，你可知道自行车的历史？虽然，在乐视超级自行车的发布\r\n会上，它已经用了自行车史上有着重要地位的三个名字——斯塔利、西夫拉克、阿尔普迪埃——来命名自家的自行车，但那远远不够。Gizmodo \r\n为我们梳理了自行车发展的关键节点。</p><p>在开始之前，我们先来看看丹麦的设计师制作的动画，一分钟看完自行车近 200 年的演变。</p><p>比较公认的说法是，第一辆自行车由法国手工艺人西夫拉克（Médé de \r\nSivrac）设计，在两个轮子上安装了支架并配上马鞍，前进的话需要用脚蹬地提供动力。这还只是一个很简单的雏形，没有方向舵，转弯的时候需要骑行者下\r\n车抬起前轮，稳定性也不好。</p><p>德国人杜莱斯（Karl Drais von \r\nSauerbronn）制作了一辆和西夫拉克的设计相近的两轮车子，增加了车把，可以改变行进中的方向，速度可以达到 \r\n15km/h。不过，还是需要靠双脚蹬地提供动力。</p><p>这时候第一辆真正意义上的自行车诞生了，是由苏格兰铁匠麦克米伦（Kirkpatrik Macmillan）设计的，它还有一个专门的名字——Velocipede。</p><p><br/></p>', '   在不少旁观者的眼里，智能化几乎成了一种避之唯恐不及的“瘟疫”，开始攀附上大大小小、各式各样的工具和设备，从水杯、灯泡、体重秤这样的小物件，再到冰箱、洗衣机这些生活中的庞然大物。兜兜转转之后，这场...', '流年', '自行车', 1467977462, 148, 32, 0),
(34, '想知道宁泽涛每天游多少圈？送他 Misfit 最新款 Spe', '<p>就算你敢带着 Apple Watch 下水游泳，它也不能记录你游了多少圈。 \r\n夏天刚来时就不停地听到有人提起“有没有在我游泳的时候可以帮忙数圈的设备”，今天 Misfit 终于赶在夏天结束之前推出可追踪游泳运动的新款 \r\nShine。这款新设备是 Misfit 与泳衣品牌 Speedo （速比涛）合作推出，因此被命名为 Speedo Shine。</p>', '就算你敢带着 Apple Watch 下水游泳，它也不能记录你游了多少圈。 \r\n夏天刚来时就不停地听到有人提起“有没有在我游泳的时候可以帮忙数圈的设备”，今天 Misfit 终于赶在夏天结束之前推出可...', '流年', '游泳', 1468236855, 121, 32, 0),
(35, '对话春水堂，情趣电商站着把钱赚了的方法论 | iSeed ', '<p>当春水堂不再只是卖成人用品——虽然蔺德刚更喜欢用“性玩具”来指代这个词——那么它到底是想成为什么？此前，“春叔”对腾讯科技说，春水堂未来是希望\r\n“成为两性以及情侣关系的私人管家”。在接受爱范儿的采访时，他阐述更加清晰的进一步定位，春水堂“未来将从成人用品电商，转型为性健康产业的生态型公\r\n司。未来将介入到咨询领域，破除性观念上的认知和知识上的障碍，还可能会延展到药品领域等等。<br/></p>', '当春水堂不再只是卖成人用品——虽然蔺德刚更喜欢用“性玩具”来指代这个词——那么它到底是想成为什么？此前，“春叔”对腾讯科技说，春水堂未来是希望\r\n“成为两性以及情侣关系的私人管家”。在接受爱范儿的采访...', '流年', '情趣电商', 1468237075, 143, 33, 0),
(36, 'H+ 后台主题UI框架', '<p>H+是一个完全响应式，基于Bootstrap3.3.5最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等\r\n现代技术，她提供了诸多的强大的可以重新组合的UI组件，并集成了最新的jQuery版本(v2.1.4)，当然，也集成了很多功能强大，用途广泛的\r\njQuery插件，她可以用于所有的Web应用程序，如<strong>网站管理后台</strong>，<strong>网站会员中心</strong>，<strong>CMS</strong>，<strong>CRM</strong>，<strong>OA</strong>等等，当然，您也可以对她进行深度定制，以做出更强系统。</p><p><br/></p><br/>', 'H+是一个完全响应式，基于Bootstrap3.3.5最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等\r\n现代技术，她提供了诸多的强大的可以重新组合的UI组件，并集...', '流年', 'H+后台主题', 1468293204, 126, 34, 0),
(43, '关于我', '<p><br/></p><p>网名：LiuNian | 流年</p><p>姓名：王国祥</p><p>生日：1988-7-03<br/>籍贯：山东省-菏泽市<br/>现居：上海市-浦东新区<br/>职业：PHP开发<br/>喜欢的书：《红与黑》《红楼梦》<br/>喜欢的音乐：《burning》《just one last dance》《相思引》</p>', '网名：LiuNian | 流年姓名：王国祥生日：1988-7-03籍贯：山东省-菏泽市现居：上海市-浦东新区职业：PHP开发喜欢的书：《红与黑》《红楼梦》喜欢的音乐：《burning》《just on...', '流年', '', 0, 101, 31, 0),
(47, '安大厦 ', '<p>asadasdas</p>', 'asadasdas', '流年', ' 阿大声道', 1469589801, 100, 0, 1),
(48, 'asdasdasdasd', '<p>szxzxcxzzxcz&nbsp;</p>', 'szxzxcxzzxcz ', '流年', 'dasdasda d', 1469591153, 100, 0, 1),
(49, ' 啊实打实大师', '<p>da实打实大师</p>', 'da实打实大师', '流年', 'asdasd', 1469611092, 100, 0, 1),
(50, '手把手成为web开发工程师（十三）php-低调的SPL', '<p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;text-align: justify;white-space: normal;background-color: rgb(255, 255, 255)"><span style="font-family: 宋体">这一篇说的是大家经常在用，但是又忽略了的一个</span>php<span style="font-family: 宋体">功能</span>—SPL</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;text-align: justify;white-space: normal;background-color: rgb(255, 255, 255)"><span style="line-height: 28.8px; font-family: 宋体;">系列第</span><span style="line-height: 28.8px;">13</span><span style="line-height: 28.8px; font-family: 宋体;">篇了，老规矩，<span style="color: gray">灰色的是基本的知识，扫两眼看看就可以了，</span><span style="color: black">黑色的正文，</span><span style="color: rgb(192, 0, 0)">红色的是重点，最好仔细看下。</span></span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;text-align: justify;white-space: normal;background-color: rgb(255, 255, 255)"><span style="color: rgb(192, 0, 0)">&nbsp;</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;white-space: normal;background-color: rgb(255, 255, 255)">SPL<span style="font-family: 宋体">，</span>PHP&nbsp;<span style="font-family: 宋体">标准库（</span>Standard PHP Library<span style="font-family: 宋体">）</span>&nbsp;<span style="font-family: 宋体;font-size: 16px">，此从&nbsp;PHP 5.0&nbsp;起内置的组件和接口，并且从PHP5.3&nbsp;已逐渐的成熟。SPL&nbsp;其实在所有的&nbsp;PHP5&nbsp;开发环境中被内置，同时无需任何设置。</span><span style="font-family: 宋体;font-size: 16px">似乎大家都不太了解它。究其原因，可以追述到它那阳春白雪般的说明文档，使你忽略了“它的存在”。SPL&nbsp;这块宝石犹如铁达尼的“海洋之心”般，被沉入海底。而现在它应该被我们捞起，并将它穿戴在应有的位置 ，而这也是这篇文章所要表述的观点。</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;white-space: normal;background-color: rgb(255, 255, 255)"><span style="font-family: 宋体;font-size: 16px">那么，</span>SPL<span style="font-family: 宋体;font-size: 16px">&nbsp;</span><span style="font-family: 宋体;font-size: 16px">提供了什么？</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;white-space: normal;background-color: rgb(255, 255, 255)"><span style="color: red;font-family: 宋体;font-size: 16px">SPL&nbsp;</span><span style="color: red;font-family: 宋体;font-size: 16px">对&nbsp;PHP&nbsp;引擎进行了扩展，例如&nbsp;ArrayAccess、Countable&nbsp;和&nbsp;SeekableIterator&nbsp;等接口，它们用于以数组形式操作对象。同时，你还可以使用&nbsp;RecursiveIterator、ArrayObejcts等其他迭代器进行数据的迭代操作。</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;white-space: normal;background-color: rgb(255, 255, 255)"><span style="color: red;font-family: 宋体;font-size: 16px">它还内置几个的对象例如&nbsp;Exceptions、SplObserver、Spltorage&nbsp;以及spl<em>autoload</em>register、spl<em>classes</em><em>、iterator</em>apply&nbsp;等的帮助函数（helper functions），用于重载对应的功能。</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;white-space: normal;background-color: rgb(255, 255, 255)"><span style="font-family: 宋体;font-size: 16px">这些工具聚合在一起就好比是把多功能的瑞士军刀，善用它们可以从质上提升&nbsp;PHP&nbsp;的代码效率。那么，我们如何发挥它的威力？</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;text-align: justify;white-space: normal;background-color: rgb(255, 255, 255)"><span style="font-family: 宋体">这里介绍几个常用的，抛砖引玉，希望大家发觉更多的东西。</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;white-space: normal;background-color: rgb(255, 255, 255)"><span style="font-weight: bolder"><span style="color: red;font-family: 宋体;font-size: 16px">1.重载&nbsp;autoloader</span></span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;white-space: normal;background-color: rgb(255, 255, 255)"><span style="font-family: 宋体;font-size: 16px">大家应该都知道如何使用&nbsp;__autoload&nbsp;去代替&nbsp;includes/requires&nbsp;操作惰性载入对应的类，对不？</span><span style="font-family: 宋体;font-size: 16px">但久之，你会发现你已经陷入了困境，首先是你要保证你的类文件必须在指定的文件路径中，例如在&nbsp;Zend&nbsp;框架中你必须使用“_”来分割类、方法名称（你如何解决这一问题？）。</span><span style="font-family: 宋体;font-size: 16px">另外的一个问题，就是当项目变得越来越复杂，&nbsp;__autoload&nbsp;内的逻辑也会变得相应的复杂。到最后，甚至你会加入异常判断，以及将所有的载入类的逻辑如数写到其中。</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;white-space: normal;background-color: rgb(255, 255, 255)"><span style="font-family: 宋体;font-size: 16px">大家都知道“鸡蛋不能放到一个篮子中”，利用&nbsp;SPL&nbsp;可以分离&nbsp;__autoload&nbsp;的载入逻辑。只需要写个你自己的&nbsp;autoload&nbsp;函数，然后利用&nbsp;SPL&nbsp;提供的函数重载它。</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;white-space: normal;background-color: rgb(255, 255, 255)"><span style="font-family: 宋体;font-size: 16px">例如上述&nbsp;Zend&nbsp;框架的问题，你可以重载&nbsp;Zend loader&nbsp;对应的方法，如果它没有找到对应的类，那么就使用你先前定义的函数。</span></p><pre style="margin-top: 0px;margin-bottom: 0px;padding: 0px;unicode-bidi: embed;white-space: pre-wrap" class="brush:php;toolbar:false;">&lt;?phpclass&nbsp;MyLoader&nbsp;{\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;static&nbsp;function&nbsp;doAutoload($class)&nbsp;{\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;本模块对应的&nbsp;autoload&nbsp;操作\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;}\r\n\r\n}\r\n\r\n&nbsp;\r\n\r\nspl_autoload_register(&nbsp;array(&#39;MyLoader&#39;,&nbsp;&#39;doAutoload&#39;)&nbsp;);?&gt;</pre><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;text-align: justify;white-space: normal;background-color: rgb(255, 255, 255)"><span style="font-family: 宋体;font-size: 16px">正如你所见，</span><span style="color: red">spl_autoload_register</span><span style="color: red;font-family: 宋体;font-size: 16px">&nbsp;</span><span style="color: red;font-family: 宋体;font-size: 16px">还能以数组的形式加入多个载入逻辑</span><span style="font-family: 宋体;font-size: 16px">。同时，你还可以利用</span>spl_autoload_unregister<span style="font-family: 宋体;font-size: 16px">&nbsp;</span><span style="font-family: 宋体;font-size: 16px">移除已经不再需要的载入逻辑，这功能总会用到的。</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;white-space: normal;background-color: rgb(255, 255, 255)"><span style="font-weight: bolder"><span style="color: red;font-family: 宋体;font-size: 16px">2.迭代器</span></span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;white-space: normal;background-color: rgb(255, 255, 255)"><span style="font-family: 宋体">迭代</span><span style="font-family: 宋体;font-size: 16px">是常见设计模式之一，普遍应用于一组数据中的统一的遍历操作。可以毫不夸张的说，SPL&nbsp;提供了所有你需要的对应数据类型的迭代器。</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;white-space: normal;background-color: rgb(255, 255, 255)"><span style="font-family: 宋体;font-size: 16px">有个非常好的例子就是遍历目录。常规的做法就是使用&nbsp;scandir 或者glob，然后跳过”.”和”..”，以及其它未满足条件的文件。例如你需要遍历个某个目录抽取其中的图片文件，就需要判断是否是&nbsp;jpg、gif&nbsp;结尾。</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;white-space: normal;background-color: rgb(255, 255, 255)"><span style="font-family: 宋体;font-size: 16px">下面的代码就是使用&nbsp;SPL&nbsp;的迭代器执行上述递归寻找指定目录中的图片文件的例子：</span></p><pre style="margin-top: 0px;margin-bottom: 0px;padding: 0px;unicode-bidi: embed;white-space: pre-wrap" class="brush:php;toolbar:false;">&lt;?phpclass&nbsp;RecursiveFileFilterIterator&nbsp;extends&nbsp;FilterIterator&nbsp;{\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;满足条件的扩展名\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;protected&nbsp;$ext&nbsp;=&nbsp;array(&#39;jpg&#39;,&#39;gif&#39;);&nbsp;\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;/**\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;提供&nbsp;$path&nbsp;并生成对应的目录迭代器\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*/\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;__construct($path)&nbsp;{\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;parent::__construct(new&nbsp;RecursiveIteratorIterator(new&nbsp;RecursiveDirectoryIterator($path)));\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;/**\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;检查文件扩展名是否满足条件\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*/\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;accept()&nbsp;{\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$item&nbsp;=&nbsp;$this-&gt;getInnerIterator();&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;($item-&gt;isFile()&nbsp;&amp;&amp;&nbsp;in_array(pathinfo($item-&gt;getFilename(),&nbsp;PATHINFO_EXTENSION),&nbsp;$this-&gt;ext))&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;TRUE;\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;}\r\n\r\n}//&nbsp;实例化foreach&nbsp;(new&nbsp;RecursiveFileFilterIterator(&#39;/path/to/something&#39;)&nbsp;as&nbsp;$item)&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;$item&nbsp;.&nbsp;PHP_EOL;\r\n\r\n}?&gt;</pre><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;text-align: justify;white-space: normal;background-color: rgb(255, 255, 255)">&nbsp;<span style="color: red;font-family: 宋体;font-size: 16px">你可能会说，这不是花了更多的代码去办同一件事情吗？那么，您从另一个角度看下，你不是拥有了具有高度重用而且可以单元测试的代码了吗?</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;white-space: normal;background-color: rgb(255, 255, 255)"><span style="font-weight: bolder"><span style="color: red;font-family: 宋体;font-size: 16px">3.SplFixedArray</span></span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;white-space: normal;background-color: rgb(255, 255, 255)"><span style="font-family: 宋体;font-size: 16px">SPL&nbsp;</span><span style="font-family: 宋体;font-size: 16px">还内置了一系列的数组操作工具，例如可以使用&nbsp;SplFixedArray&nbsp;实例化一个固定长度的数组。有些同学会问，php最大的方便之处就是数据，那么为什么要使用这个它？因为它更快！</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;white-space: normal;background-color: rgb(255, 255, 255)"><span style="font-family: 宋体;font-size: 16px">我们知道&nbsp;PHP&nbsp;常规的数组包含不同类型的键，例如数字、字符串等，并且长度是可变的。正是因为这些“高级功能”，PHP&nbsp;以散列（hash）的方式通过键得到对应的值&nbsp;--&nbsp;其实这在特定情况这会造成性能问题。</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;white-space: normal;background-color: rgb(255, 255, 255)"><span style="color: red;font-family: 宋体;font-size: 16px">而&nbsp;SplFixedArray&nbsp;因为是使用固定的数字键，所以它并没有使用散列存储方式。不确切的说，甚至你可以认为它就是个&nbsp;C&nbsp;数组。这就是为什么&nbsp;SplFixedArray&nbsp;会比通常数组要快的原因（在&nbsp;PHP5.3&nbsp;中才加入，注意）。</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;white-space: normal;background-color: rgb(255, 255, 255)"><span style="font-family: 宋体;font-size: 16px">如果你需要大量的数组操作，那么你可以尝试下，相信它是值得拥有的。</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;text-align: justify;white-space: normal;background-color: rgb(255, 255, 255)">&nbsp;<span style="font-family: 宋体">最后来张手册上</span>SPL<span style="font-family: 宋体">的全家福</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em;color: rgb(68, 68, 68);font-family: &#39;Microsoft Yahei&#39;, 微软雅黑;line-height: 28.8px;text-align: justify;white-space: normal;background-color: rgb(255, 255, 255)"><span style="font-family: 宋体;font-size: 16px"><img width="248" height="930" id="图片 1" src="http://km.oa.com/files/post_photo/123/217123/95ad0dfdc21e371fd79105952a2074ef.jpg"/></span></p><p><br/></p>', '这一篇说的是大家经常在用，但是又忽略了的一个php功能—SPL系列第13篇了，老规矩，灰色的是基本的知识，扫两眼看看就可以了，黑色的正文，红色的是重点，最好仔细看下。 SPL，PHP 标准库（Stan...', '流年', 'SPL', 1469705821, 148, 34, 0);
INSERT INTO `fc_blog` (`id`, `title`, `content`, `summary`, `blogauther`, `tags`, `time`, `click`, `cid`, `del`) VALUES
(51, '傲世西游项目HTML5运营技术分享', '<p><span class="lead_title mr_s" style="margin-right: 5px;color: rgb(15, 149, 235)">| 导语</span>&nbsp;游戏中通过HTML5去做游戏运营 可以达到哪种程度</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><span style="font-weight: bolder">一、游戏中的<span style="font-family: Helvetica, sans-serif">HTML5</span></span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 一般在手机游戏中<span style="font-family: Helvetica, sans-serif">,html5</span>的使用比较少，从我们常玩的游戏中就能体验出来。但傲世西游是个例外，游戏内包含了很多<span style="font-family: Helvetica, sans-serif">H5</span>的身影，这也是我们游戏的一大特点，而且效果显著。</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">由于本人初入公司就是做手机社区家园模块的，之后转型做游戏研发，所以把之前做<span style="font-family: Helvetica, sans-serif">wap</span>的经验拿来，帮助傲世西游完成部分运营需求，这本身就是一个很契合的事情。傲世西游就是这样的一款游戏，充分把<span style="font-family: Helvetica, sans-serif">h</span><span style="font-family: Helvetica, sans-serif">5</span>优势发挥出来。</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">傲世西游的Ｈ<span style="font-family: Helvetica, sans-serif">5</span>模块的特点：</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><span style="font-family: Helvetica, sans-serif">1</span>）简单高效<span style="font-family: Helvetica, sans-serif">&nbsp;</span>接入方便，对于紧急需求，反应最为快速</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><span style="font-family: Helvetica, sans-serif">2</span>）实现效果可控<span style="font-family: Helvetica, sans-serif">(</span>有资源支持可以做到<span style="font-family: Helvetica, sans-serif">app</span>的体验<span style="font-family: Helvetica, sans-serif">)</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><span style="font-family: Helvetica, sans-serif">3</span>）支持灰度发布</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">但<span style="font-family: Helvetica, sans-serif">h5</span>最主要的劣势是，相对于<span style="font-family: Helvetica, sans-serif">native</span>，更加消耗流量，但移动网络发展到现在流量并不是太大的限制。</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><span style="font-weight: bolder">二、Ｈ<span style="font-family: Helvetica, sans-serif">5</span>模块</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">&nbsp;傲世西游Ｈ<span style="font-family: Helvetica, sans-serif">5</span>模块主要由<span style="font-family: Helvetica, sans-serif">3</span>部分组成，公告系统、活动模版、任务系统及一些其它页面（特权页、旧的论坛）</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">下图是主要的三大模块组成</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><span style="z-index: 251657216;left: -10px;top: 0px;width: 485px;height: 364px"><img width="485" height="364" src="http://km.oa.com/files/post_photo/467/290467/5f132206f7876f417be8b77674c17f1b1469608868.jpg"/></span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">简单介绍下这三个模块：</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><span style="font-family: Helvetica, sans-serif">a.</span>公告系统</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">这是进入我们游戏首个页面，展示最新游戏公告，充分利用<span style="font-family: Helvetica, sans-serif">css</span>，很容易做到和客户端的契合。为了方便运营同学管理，搭建一个公告管理平台<span style="font-family: Helvetica, sans-serif">,</span>包含公告列表和编辑功能，如下图</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><img width="450" height="471" src="http://avocado.oa.com/fconv/files/201607/ad49ea771c4c5c2f23246892cecd7fcd.files/doc_image_1_w450_h471.jpg"/></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><br/></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">公告列表展示</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><img width="485" height="134" src="http://avocado.oa.com/fconv/files/201607/ad49ea771c4c5c2f23246892cecd7fcd.files/doc_image_2_w485_h134.jpg"/>&nbsp;</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">通过这个公告系统，运营同学可以完全自主去管理公告。</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">公告页面定时去后台刷新最新的的公告，并展示出来。同时提供了一套，未读、已读的逻辑。</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><span style="font-family: Helvetica, sans-serif">b.</span>任务系统</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">每个游戏都有一个任务系统，傲世西游基于敏捷开发的特性，实现了一整套的任务系统的前后逻辑。</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">目前任务系统已经配置了近<span style="font-family: Helvetica, sans-serif">70</span>种不同任务模板，包含了从登录、充值、消耗、数值达成这些大类及各类系统功能相关连的任务。</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">下图是当前任务可供运营产品同学配置的类型</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><img width="482" height="75" src="http://avocado.oa.com/fconv/files/201607/ad49ea771c4c5c2f23246892cecd7fcd.files/doc_image_3_w482_h75.jpg"/></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">傲世西游<span style="font-family: Helvetica, sans-serif">90%</span>的重要系统功能玩法基本都有配套的一些任务，这些任务可以完成对系统功能奖励的完善，对数值的平横也有益处，因为非常方便去配置这些奖励的规则。</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">这套任务系统目前也运营有很长一段时间了，比较稳定。大概的架构如下：</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><img width="482" height="362" src="http://avocado.oa.com/fconv/files/201607/ad49ea771c4c5c2f23246892cecd7fcd.files/doc_image_4_w482_h362.jpg"/></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">可以看到任务系统完全独立于GameServers之外，GameServers只需要实现一些数据的上报的功能，任务后台通过java-c++的rpc调用获取关键数据，组合上报数据和拉取的数据，配合不同的逻辑实现各种任务。</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">由于一开始就想实现一套由产品可以完全自主的任务系统，所以去搭建了一套相对完善的任务管理系统，包含任务的各项管理。</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">任务管理页面：</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><img width="482" height="340" src="http://avocado.oa.com/fconv/files/201607/ad49ea771c4c5c2f23246892cecd7fcd.files/doc_image_5_w482_h340.jpg"/></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><br/></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">对于任务的管理，即可以通过手工在页面上操作，也可以通过excel表格去处理。管理平台实现了一套由<span style="font-family: Helvetica, sans-serif">excel</span>表格去维护的同步工具，方便实用。如下图：<img width="482" height="190" src="http://avocado.oa.com/fconv/files/201607/ad49ea771c4c5c2f23246892cecd7fcd.files/doc_image_6_w482_h190.jpg"/></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><span style="font-family: Helvetica, sans-serif">c.</span>活动模板</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">活动模板在傲世西游代表的是一个完整的活动<span style="font-family: Helvetica, sans-serif">,</span>可能包含<span style="font-family: Helvetica, sans-serif">1</span>个或多个<span style="font-family: Helvetica, sans-serif">h5</span>页面，覆盖排行榜、数值兑换、充值活动、活跃类、荣誉类等几大类活动，比如对排行榜，我们有十多种<span style="font-family: Helvetica, sans-serif">,</span>收敛到一个固定位置。&nbsp;</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><img width="296" height="482" src="http://avocado.oa.com/fconv/files/201607/ad49ea771c4c5c2f23246892cecd7fcd.files/doc_image_7_w296_h482.jpg"/></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">&nbsp;每周每月，傲世西游都会配置多个<span style="font-family: Helvetica, sans-serif">H5</span>活动上线<span style="font-family: Helvetica, sans-serif">,</span>比如拉充值的排行榜活动。<img width="349" height="482" src="http://avocado.oa.com/fconv/files/201607/ad49ea771c4c5c2f23246892cecd7fcd.files/doc_image_8_w349_h482.jpg"/></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">这个功能就包括了展示、膜拜、领奖多个功能。</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">如团购：</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><img src="http://km.oa.com/files/photos/captures/201607/1469603822_15_w666_h595.png"/>&nbsp;</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">在此活动中，对刺激用户的消费有很大的作用，通过h5活动动模板，我们实现了这种效果。包括团购认购及之后的结余操作，对于这些运营手段可以联系我。活动模板我们有几十类，不再列举了。</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><span style="font-weight: bolder">三、傲视西游Ｈ<span style="font-family: Helvetica, sans-serif">5</span>实现</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">傲世西游的<span style="font-family: Helvetica, sans-serif">H5</span>模块和客户端及后台的耦合很小，客户端只需要一个<span style="font-family: Helvetica, sans-serif">WebView</span>管理的组件，而Ｈ<span style="font-family: Helvetica, sans-serif">5</span>的后台独立于<span style="font-family: Helvetica, sans-serif">GameServer</span>之外，只需要通过<span style="font-family: Helvetica, sans-serif">t</span><span style="font-family: Helvetica, sans-serif">af</span>框架进行基于<span style="font-family: Helvetica, sans-serif">java-c++</span>的通信。后面会具体说明这种架构方式。</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><span style="font-family: Helvetica, sans-serif">H</span><span style="font-family: Helvetica, sans-serif">5</span>的实现很重要的一块是如何处理<span style="font-family: Helvetica, sans-serif">javascript</span>与<span style="font-family: Helvetica, sans-serif">native</span>代码的交互，下面会说明两个平台的处理。</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><span style="font-family: Helvetica, sans-serif">a.</span><span style="font-family: Helvetica, sans-serif">Android</span>平台的<span style="font-family: Helvetica, sans-serif">Webview</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">对于<span style="font-family: Helvetica, sans-serif">Android</span>平台，我们可以使用系统的<span style="font-family: Helvetica, sans-serif">Webview</span>，最初我们也是用系统的。后面接<span style="font-family: Helvetica, sans-serif">MSDK</span>后，便切换到ＱＱ浏览器内核的<span style="font-family: Helvetica, sans-serif">Webview</span>控件。</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><span style="font-family: Helvetica, sans-serif">Android</span>平台下，一般<span style="font-family: Helvetica, sans-serif">javascript</span>和<span style="font-family: Helvetica, sans-serif">native</span>交互的方式有两类实现。</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><span style="font-family: Helvetica, sans-serif">1.</span><span style="font-family: Helvetica, sans-serif">addJavascriptInterface</span></p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">通过<span style="font-family: Helvetica, sans-serif">webview</span>的<span style="font-family: Helvetica, sans-serif">addJavascriptInterface</span>可以很方便实现<span style="font-family: Helvetica, sans-serif">javascript</span>和<span style="font-family: Helvetica, sans-serif">native</span>代码的交互。但这种实现有比较严重的漏洞，攻击者可以利用此漏洞执行任意的命令。在问题在<span style="font-family: Helvetica, sans-serif">4.2</span>以上的系统可以通过向导出的方法添加注解来解决问题，<span style="font-family: Helvetica, sans-serif">google</span>对此进行了修正。但在<span style="font-family: Helvetica, sans-serif">4.2</span>以下的版本就会有问题，需要用另外的方式来解决。</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em"><span style="font-family: Helvetica, sans-serif">2.</span>通过<span style="font-family: Helvetica, sans-serif">iframe</span>或<span style="font-family: Helvetica, sans-serif">jsPrompt</span>来进行数据交互</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">这种方式的核心就是能过其它<span style="font-family: Helvetica, sans-serif">webview</span>可以捕获消息的接口来进行交互，并异步回调结果，这类文章在<span style="font-family: Helvetica, sans-serif">KM</span>上有很多。</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">傲世西游一开始也是用的<span style="font-family: Helvetica, sans-serif">addJavascriptInterface</span>来进行<span style="font-family: Helvetica, sans-serif">js-java</span>交互但，但这个漏洞被曝光后，我就不得不转为第二类处理方式。</p><p style="margin-top: 0px;margin-bottom: 1em;padding: 0px;unicode-bidi: embed;min-height: 1.8em">通过<span style="font-family: Helvetica, sans-serif">onJsAlert</span>处理<span style="font-family: Helvetica, sans-serif">message</span>中特点的字符串，处理完后用通过<span style="font-family: Helvetica, sans-serif">view.loadUrl</span>进行<span style="font-family: Helvetica, sans-serif">javascript</span>回调，代码如下：</p><pre class="brush:php;toolbar:false">public&nbsp;boolean&nbsp;onJsAlert(WebView&nbsp;view,&nbsp;String&nbsp;url,&nbsp;String&nbsp;message,&nbsp;JsResult&nbsp;result)&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;try&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(message&nbsp;!=&nbsp;null&nbsp;&amp;&amp;&nbsp;!message.isEmpty())&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;String[]&nbsp;args&nbsp;=&nbsp;message.split(&quot;:&quot;);&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;int&nbsp;argc&nbsp;=&nbsp;args.length;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(message.startsWith(&quot;jscall&quot;))&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;jscall@setResponse\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;String&nbsp;jsCallBackFuc&nbsp;=&nbsp;null;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(args[0].split(&quot;@&quot;).length&nbsp;&gt;=&nbsp;2)&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;jsCallBackFuc&nbsp;=&nbsp;args[0].split(&quot;@&quot;)[1];\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;调用约定\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(argc&nbsp;&gt;=&nbsp;2\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&amp;&amp;&nbsp;&quot;setOnlineNotifyFlag&quot;.equals(args[1]))&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;int&nbsp;ret&nbsp;=&nbsp;gamePkg.setOnlineNotifyFlag();\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;checkCallBack(view,&nbsp;jsCallBackFuc,&nbsp;ret);\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;else&nbsp;if…..\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;…\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;result.cancel();&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;true;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;catch(Exception&nbsp;e)&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Log.i(&quot;jscall&quot;,&nbsp;&quot;call&nbsp;error&quot;,&nbsp;e);\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;super.onJsAlert(view,&nbsp;url,&nbsp;message,&nbsp;result);\r\n}</pre><p><br/></p>', '| 导语 游戏中通过HTML5去做游戏运营 可以达到哪种程度一、游戏中的HTML5            一般在手机游戏中,html5的使用比较少，从我们常玩的游戏中就能体验出来。但傲世西游是个例外，...', '流年', 'HTML5', 1469706023, 253, 34, 0);

-- --------------------------------------------------------

--
-- 表的结构 `fc_blog_attr`
--

CREATE TABLE IF NOT EXISTS `fc_blog_attr` (
  `bid` int(10) unsigned NOT NULL,
  `aid` int(10) unsigned NOT NULL,
  KEY `bid` (`bid`),
  KEY `aid` (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `fc_blog_attr`
--

INSERT INTO `fc_blog_attr` (`bid`, `aid`) VALUES
(6, 1),
(6, 2),
(6, 3),
(15, 1),
(12, 1),
(12, 2),
(12, 3),
(21, 1),
(21, 2),
(21, 3);

-- --------------------------------------------------------

--
-- 表的结构 `fc_cate`
--

CREATE TABLE IF NOT EXISTS `fc_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(15) NOT NULL DEFAULT '',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `sort` smallint(6) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- 转存表中的数据 `fc_cate`
--

INSERT INTO `fc_cate` (`id`, `name`, `pid`, `sort`) VALUES
(31, '关于我', 0, 1),
(32, '慢生活', 0, 2),
(33, '碎言碎语', 0, 3),
(34, '学习分享', 0, 4),
(35, '学无止境', 0, 5),
(36, '随拍', 0, 100);

-- --------------------------------------------------------

--
-- 表的结构 `fc_flink`
--

CREATE TABLE IF NOT EXISTS `fc_flink` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID序号',
  `flinkname` varchar(30) NOT NULL COMMENT '链接名称',
  `flink` varchar(200) DEFAULT NULL COMMENT '超链接详情',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `fc_flink`
--

INSERT INTO `fc_flink` (`id`, `flinkname`, `flink`) VALUES
(1, '百度', 'http://www.baidu.com'),
(2, '谷歌', 'http://www.google.cn'),
(3, '搜狐', 'http://www.sohu.com'),
(4, '网易', 'http://www.163.com');

-- --------------------------------------------------------

--
-- 表的结构 `fc_img_cate`
--

CREATE TABLE IF NOT EXISTS `fc_img_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img_cate_name` char(15) NOT NULL COMMENT '相册名称',
  `img_cate_content` varchar(255) DEFAULT NULL COMMENT '相册描述',
  `imgbg` varchar(255) NOT NULL DEFAULT 'img/pho_bg.jpg' COMMENT '相册封面',
  `img_cate_sort` smallint(6) DEFAULT '100' COMMENT '相册排序',
  `photonum` varchar(255) DEFAULT '0' COMMENT '照片数量',
  PRIMARY KEY (`id`),
  UNIQUE KEY `img_cate_name` (`img_cate_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `fc_img_cate`
--

INSERT INTO `fc_img_cate` (`id`, `img_cate_name`, `img_cate_content`, `imgbg`, `img_cate_sort`, `photonum`) VALUES
(20, '默认相册', '默认相册', 'Public/thumb/57ad8ba7b7c80.jpg', 100, '6');

-- --------------------------------------------------------

--
-- 表的结构 `fc_saying`
--

CREATE TABLE IF NOT EXISTS `fc_saying` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `say_img_path` varchar(255) DEFAULT NULL COMMENT '说说图片地址',
  `say_content` text NOT NULL COMMENT '说说内容',
  `say_time` int(10) unsigned NOT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- 转存表中的数据 `fc_saying`
--

INSERT INTO `fc_saying` (`id`, `say_img_path`, `say_content`, `say_time`) VALUES
(36, NULL, '女朋友又想辞职了，唉~工作累是很正常啊，因为是小公司', 1469591436),
(37, NULL, '今天周三了，这个博客项目也快做完了~~ 加油！欧耶~', 1469591511),
(38, NULL, '晚上回去lol,我这水平，什么时候能成王者~~~~', 1469591554);

-- --------------------------------------------------------

--
-- 表的结构 `fc_user`
--

CREATE TABLE IF NOT EXISTS `fc_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '',
  `nickname` char(255) DEFAULT NULL COMMENT '昵称',
  `password` char(32) NOT NULL DEFAULT '',
  `registertime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册日期',
  `loginip` char(20) NOT NULL DEFAULT '',
  `IconPath` char(255) NOT NULL COMMENT '头像地址',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `fc_user`
--

INSERT INTO `fc_user` (`id`, `username`, `nickname`, `password`, `registertime`, `logintime`, `loginip`, `IconPath`) VALUES
(1, 'admin', '流年', '21232f297a57a5a743894a0e4a801fc3', 0, 1470986355, '0.0.0.0', 'Public/Admin/Uploads/avatar/1/1.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
