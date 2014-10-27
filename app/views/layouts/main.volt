<header>
    <div class="headerMain">
        <a class="undecorate"  href="javascript:;">
            <div class="logoCtn"></div>
        </a>
        <div class="vMiddle hCtnLeft">
        <table><tbody><tr>
        <td class="logoDesc"><div><a class="undecorate"  href="javascript:;">问答社区</a><div></td>
        <td>
            <div class="searchCtn">
            <input class="searchInput" type="text" placeholder="搜索问题、用户..." />
            <input class="searchBtn ppticon" type="submit" value="0" />
            </div>
        </td>
        <td>
            <a class="headerFunc undecorate" href="javascript:;" style="margin-left:20px;">我要提问</a>
        </td>
        </tr></tbody></table>
        </div>
        <div class="vMiddle hCtnRight">
        <table><tbody><tr>
        {{ elements.getMenu() }}
        </tr></tbody></table>
        </div>
    </div>
</header>

<div class="main">
    {{ flash.output() }}
    {{ content() }}
</div>
