<div class="span-24 search-left-top">
<span id="searchKey"></span>
<span id="searchFeedback"></span>
</div>
<div class="span-9 search-left">
	<div class="span-9 search-left-content">
		关键字为空
	</div>
	<!--左侧搜索结果模板块，默认不显示，每条搜索结果都clone这个-->
	<div class="span-9" id="searchResult">
		<div class="span-3" class="result-img">
			<img src="http://img3.douban.com/pics/book-default-small.gif" />
		</div>
		<div class="span-6 last result-content">
			<b class="result-title">暂无</b><br />
			作者:<span class="result-author">暂无</span><br />
			出版社:<span class="result-publisher">暂无</span><br />
			出版日期:<span class="result-pubdate">暂无</span><br />
		</div>
		<input type="hidden" value="" />
	</div>
	<!--左侧搜索结果“更多”-->
	<div class="span-9 search-left-more">
		<div class="search-left-more-feedback">
			正在读取中...
		</div>
		<div class="search-left-more-content">
		共<span id="totalNum"></span>本书,
		已显示<span id="readyNum"></span>本,点击显示更多
		</div>
	</div>
</div>
<div class="span-15 last">
	推荐块。。。
	<!--右侧详细结果-->
	<div class="span-15 search-right-box">
		<!--右侧详细结果头部-->
		<div class="span-15 search-right-box-top">
			<span class="search-right-box-title">读取中...</span>
			<div class="search-right-box-close">关闭&nbsp;×</div>
		</div>
		<!--右侧详细结果内容-->
		<div class="span-15 search-right-box-content">
			<div class="span-14 search-right-box-info">
				<div class="span-6 search-right-box-img">
					<img src="http://img3.douban.com/pics/book-default-small.gif" class="span-5" />
				</div>
				<div class="span-8 search-right-box-detail last">
					<span class="detail-title span-8">书名:暂无</span>
					<span class="detail-subtitle span-8">副标题:暂无</span>
					<span class="detail-author span-8">作者:暂无</span>
					<span class="detail-translator span-8">译者:暂无</span>
					<span class="detail-publisher span-8">出版社:暂无</span>
					<span class="detail-isbn span-8">ISBN:暂无</span>
					<span class="detail-pubdate span-8">出版日期:暂无</span>
					<span class="detail-price span-8">官方价格:暂无</span>
					<span class="detail-pages span-8">页数:暂无</span>
					<span class="detail-binding ">装帧:暂无</span>
				</div>
				<div class="span-14 search-right-box-do">
					<div class="span-7 search-right-box-want">
						<span>我有书</span>
						<div class="search-right-box-wantdo" style="margin-right:10px;" id="lend_button">
							共享
						</div>
						<div class="search-right-box-wantdo last">
							出售
						</div>
					</div>
					<div class="span-7 search-right-box-wantNo last" id="searchRightBoxStore">
						<span>我没书</span>
					</div>
				</div>
				<div class="span-14 search-right-box-doMain" id="book_lend">
					<div class="search-right-box-doMainLeft">再添加一本共享</div>
					<div class="search-right-box-doMainRight">已登记的书</div>
					<div class="search-right-box-doMainContent" id="firstShareAdd">添加共享</div>
				</div>
				<div class="span-14 search-right-box-doMain" id="book_store">
					csadas
				</div>
				<hr class="space"/>
				图书简介:<br />
				<div class="span-14 search-right-box-summary last">
					暂无
				</div>
			</div>
		</div>
	</div>
</div>