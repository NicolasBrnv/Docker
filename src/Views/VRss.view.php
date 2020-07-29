<?php


class VRss
{
    public function __construct()
    {
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function showRss($_rss)
    {
        echo <<<HERE
        <table>
            <thead>
                <tr>
                    <th colspan="2">{$_rss->channel->description}</th>
                </tr>
            </thead>
            <tr>
                <td><em>{$_rss->channel->item->category}</em></td>
                <td><em>Torrents Link</em></td>
            </tr>
HERE;

        foreach ($_rss->channel->item as $vRss)
        {
            $idTorrent = $this->parseIdTorrent($vRss->enclosure['url']);
            
            echo '<tr>';
            echo '<td>' . $vRss->title . '</td>';
            echo "<td><a href=https://www2.yggtorrent.se/engine/download_torrent?id=$idTorrent>Torrent</a></td>";
            echo '</tr>';
        }

        echo '</table>';

    }

    public function parseIdTorrent($_rss)
    {
        $url = parse_url($_rss);
        //Crée un tableau avec les arguments de l'URL
        $urlQuery = explode("&", $url['query']);
        //Crée un tableau pour recupere l'id du torrent
        $urlId = explode("=", $urlQuery[0]);

        return $urlId[1];
    }
}