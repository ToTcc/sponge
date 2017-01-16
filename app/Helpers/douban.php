<?php

function curlCommonGet($uri) {

    $apiHead = config("thirdparty.douban-movie-api-head");
    $url = $apiHead . $uri;

    $returnJson = null;

    try {
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', $url);
        $returnJson = json_decode($res->getBody(), true);
    } catch(Exception $e) {

    } finally {
        return $returnJson;
    }

}

/**
 * @param string $keyword
 * @param int $start
 * @param int $count
 * 电影条目搜索
 * @return mixed
 */
function searchMovieByKeyword($keyword="", $start=0, $count=20) {

    $url = "/v2/movie/search?q=$keyword&start=$start&count=$count";

    return curlCommonGet($url);

}

/**
 * @param $id
 * @param int $start
 * @param int $count
 * 影人剧照
 * @return mixed
 */
function getPhotosByCelebrityId($id, $start=0, $count=10) {

    $url = "/v2/movie/celebrity/$id/photos?start=$start&count=$count";

    return curlCommonGet($url);

}

/**
 * @param $id
 * @param int $start
 * @param int $count
 * @return mixed
 */
function getWorksByCelebrityId($id, $start=0, $count=10) {

    $url = "/v2/movie/celebrity/$id/works?start=$start&count=$count";

    return curlCommonGet($url);

}

/**
 * @param $id
 * @param int $start
 * @param int $count
 * 电影条目短评列表
 * @return mixed
 */
function getMovieCommentsByMovieId($id, $start=0, $count=10) {

    $url = "/v2/movie/subject/$id/comments?start=$start&count=$count";

    return curlCommonGet($url);

}

/**
 * @param $id
 * @param int $start
 * @param int $count
 * 电影条目影评列表
 * @return mixed
 */
function getMovieReviewsByMovieId($id, $start=0, $count=10) {

    $url = "/v2/movie/subject/$id/reviews?start=$start&count=$count";

    return curlCommonGet($url);

}

/**
 * @param $id
 * 电影条目剧照
 * @return mixed
 */
function getMoviePhotosByMovieId($id) {

    $url = "/v2/movie/subject/$id/photos";

    return curlCommonGet($url);

}

/**
 * @param $id
 * 影人条目信息
 * @return mixed
 */
function getCelebrityInfoById($id) {

    $url = "/v2/movie/celebrity/" . $id;

    return curlCommonGet($url);

}

/**
 * @param $id
 * 根据豆瓣ID获取电影条目信息
 */
function getMovieInfoById($id) {

//    $movie = \App\Models\Movie::where('douban_id', $id)->first();
//
//    if(isNullOrEmpty($movie)) {
//
//        $url = "/v2/movie/subject/" . $id;
//
//        $result = curlCommonGet($url);
//
//        $movie["douban_id"] = $result["id"];
//        $movie["info"] = serialize($result);
//
//        \App\Models\Movie::create($movie);
//
//        $movie = \App\Models\Movie::where('douban_id', $id)->first();
//
//    }

    $url = "/v2/movie/subject/" . $id;

    return curlCommonGet($url);;

}

function getDoubanMovieKey($keyword, $start, $count) {
    return md5($keyword.'-'.$start.'-'.$count);
}
