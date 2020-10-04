<?php

function createStreamMonitorFile($stream_id)
{
    clearstatcache(true);
    if (file_exists('/home/xtreamcodes/iptv_xtream_codes/streams/' . $stream_id . '.monitor')) {
        $pid = intval(file_get_contents('/home/xtreamcodes/iptv_xtream_codes/streams/' . $stream_id . '.monitor'));
    }
    if (!empty($pid)) {
        if (file_exists('/proc/' . $pid)) {
            $name = trim(file_get_contents('/proc/' . $pid . '/cmdline'));
            if ($name == 'XtreamCodes[' . $stream_id . ']') {
                posix_kill($pid, 9);
            }
        } else {
            shell_exec('kill -9 `ps -ef | grep \'XtreamCodes\\[' . $stream_id . '\\]\' | grep -v grep | awk \'{print $2}\'`;');
        }
        file_put_contents('/home/xtreamcodes/iptv_xtream_codes/streams/' . $stream_id . '.monitor', getmypid());
    }
}
ipTV_stream::stopStream($stream_id);
require str_replace('\\', '/', dirname($argv[0])) . '/../wwwdir/init.php';
if (is_numeric($streamData) && $streamData == 0) {
    if (!empty($AutoRestart['days']) && !empty($AutoRestart['at'])) {
        shell_exec('kill -9 ' . $pid);
        sleep(1);
        if ($delayIsEnabled && ipTV_streaming::CheckPidStreamExist($pid, $stream_id)) {
            if (ipTV_streaming::CheckPidChannelM3U8Exist($pid, $stream_id) && file_exists($playlist)) {
                shell_exec('rm -f ' . STREAMS_PATH . $stream_id . '_*');
                echo '[*] Correct Usage: php ' . __FILE__ . ' <stream_id> [restart]
';
                if (!$delayIsEnabled) {
                    if (ipTV_lib::$SegmentsSettings['seg_time'] * 6 <= time() - $NowtimePlaylist) {
                        sleep(mt_rand(5, 10));
                        $playlistFile = md5_file($playlist);
                        if ($segTime == ipTV_lib::$SegmentsSettings['seg_time'] * 3) {
                            die;
                            shell_exec('kill -9 ' . $pid);
                            if (!(isset($streamInfo['codecs']['audio']) && !empty($streamInfo['codecs']['audio']))) {
                                $sources = array();
                                if (in_array(date('l'), $AutoRestart['days']) && date('H') == $hours) {
                                    usleep(50000);
                                    $stream_path = STREAMS_PATH;
                                    $playlist = $streamData['playlist'];
                                    $nowTime = $NowtimePlaylist = $nowTimeDate = time();
                                    if (!(0 < $streamsSys['delay_minutes'] && $streamsSys['parent_id'] == 0)) {
                                        $sourceArg = empty($argv[2]) ? false : true;
                                        if ($argc <= 1) {
                                            if ($ipTV_db->num_rows() <= 0) {
                                                sleep(1);
                                                $playlist = STREAMS_PATH . $stream_id . '_.m3u8';
                                                usleep(50000);
                                                $rows = $ipTV_db->get_rows();
                                                sleep(mt_rand(10, 25));
                                                foreach ($sources as $source) {
                                                    $sourceURL = ipTV_stream::ParseStreamURL($source);
                                                    if ($sourceURL == $source) {
                                                        break;
                                                    }
                                                    $protocol = strtolower(substr($sourceURL, 0, strpos($sourceURL, '://')));
                                                    $ArgumentsList = implode(' ', ipTV_stream::GetArguments($rows, $protocol, 'fetch'));
                                                    if ($stream_info = ipTV_stream::GetStreamInfo($sourceURL, SERVER_ID, $ArgumentsList)) {
                                                        $prioritySource = $sourceURL;
                                                        break;
                                                    }
                                                }
                                                list($streamItem) = ipTV_streaming::GetSegmentsOfPlaylist($playlist, 10);
                                                $delayIsEnabled = true;
                                                die(0);
                                                $sourceKey = array_search($source, $sources);
                                                if (ipTV_streaming::CheckPidChannelM3U8Exist($pid, $stream_id)) {
                                                    $takeCache = 0;
                                                    if (!($parent_id == 0)) {
                                                        $prioritySource = NULL;
                                                        if ($streamData === false) {
                                                            $source = $streamsSys['current_source'];
                                                            echo 'Checking For PlayList...
';
                                                            $pid = $streamsSys['delay_pid'];
                                                            $delayIsEnabled = $streamData['delay_enabled'];
                                                            ++$segTime;
                                                            if (ipTV_lib::$settings['priority_backup'] == 1 && 1 < count($sources) && $parent_id == 0 && 10 < time() - $nowTimeDate) {
                                                                $pid = $streamData['main_pid'];
                                                                $stream_path = DELAY_STREAM;
                                                                die;
                                                                shell_exec('rm -f ' . STREAMS_PATH . $stream_id . '_*');
                                                                cli_set_process_title('XtreamCodes[' . $stream_id . ']');
                                                                $stream_path = STREAMS_PATH;
                                                                do {
                                                                    shell_exec('kill -9 ' . $pid);
                                                                    if (!false) {
                                                                        break;
                                                                        $stream_path = DELAY_STREAM;
                                                                        usleep(50000);
                                                                        shell_exec('kill -9 ' . $pid);
                                                                        $AutoRestart = json_decode($streamsSys['auto_restart'], true);
                                                                        $parent_id = $streamsSys['parent_id'];
                                                                    }
                                                                } while (!ipTV_streaming::CheckPidStreamExist($pid, $stream_id));
                                                                $pid = intval(shell_exec(PHP_BIN . ' ' . TOOLS_PATH . 'delay.php ' . $stream_id . ' ' . $streamsSys['delay_minutes'] . ' >/dev/null 2>/dev/null & echo $!'));
                                                                $nowTime = time();
                                                                shell_exec('kill -9 ' . $pid);
                                                                do {
                                                                    do {
                                                                    } while (!($minutes == date('i')));
                                                                    $nowTimeDate = time();
                                                                    do {
                                                                    } while (!(ipTV_lib::$settings['audio_restart_loss'] == 1 && 300 < time() - $nowTime));
                                                                    $parent_id = $streamData['parent_id'];
                                                                    $takeCache = 0;
                                                                    createStreamMonitorFile($stream_id);
                                                                    $stream_id = intval($argv[1]);
                                                                    do {
                                                                    } while (!(RESTART_TAKE_CACHE < $takeCache));
                                                                    $ipTV_db->query('SELECT * FROM `streams` t1 INNER JOIN `streams_sys` t2 ON t2.stream_id = t1.id AND t2.server_id = \'%d\' WHERE t1.id = \'%d\'', SERVER_ID, $stream_id);
                                                                    $ipTV_db->query('SELECT t1.*, t2.* FROM `streams_options` t1, `streams_arguments` t2 WHERE t1.stream_id = \'%d\' AND t1.argument_id = t2.id', $stream_id);
                                                                    do {
                                                                    } while (!empty($streamItem));
                                                                    $ipTV_db->close_mysql();
                                                                    usleep(50000);
                                                                    define('FETCH_BOUQUETS', false);
                                                                    $delayIsEnabled = false;
                                                                    do {
                                                                        $source = $streamData['stream_source'];
                                                                        $streamInfo = ipTV_stream::GetStreamInfo($stream_path . $streamItem, SERVER_ID);
                                                                        $pid = $pid = 0;
                                                                        $segTime = 0;
                                                                        do {
                                                                        } while (ipTV_streaming::CheckPidChannelM3U8Exist($pid, $stream_id));
                                                                        $playlistFileNew = $playlistFile;
                                                                        do {
                                                                        } while (@$argc);
                                                                        do {
                                                                        } while (!(0 < $pid));
                                                                        $streamsSys['delay_available_at'] = $streamData['delay_start_at'];
                                                                        do {
                                                                        } while (!(ipTV_streaming::CheckPidChannelM3U8Exist($pid, $stream_id) && !file_exists($playlist) && $segTime <= ipTV_lib::$SegmentsSettings['seg_time'] * 3));
                                                                        do {
                                                                        } while (!($delayIsEnabled && $streamsSys['delay_available_at'] <= time() && !ipTV_streaming::CheckPidStreamExist($pid, $stream_id)));
                                                                    } while (!(0 < $sourceKey));
                                                                    $playlist = DELAY_STREAM . $stream_id . '_.m3u8';
                                                                    $ipTV_db->db_connect();
                                                                    echo 'Restarting...';
                                                                    list($hours, $minutes) = explode(':', $AutoRestart['at']);
                                                                    $streamsSys = $ipTV_db->get_row();
                                                                    set_time_limit(0);
                                                                    if (!ipTV_streaming::CheckPidChannelM3U8Exist($pid, $stream_id)) {
                                                                    } else {
                                                                        $prioritySource = NULL;
                                                                        $pid = file_exists(STREAMS_PATH . $stream_id . '_.pid') ? intval(file_get_contents(STREAMS_PATH . $stream_id . '_.pid')) : $streamsSys['pid'];
                                                                        break;
                                                                        $NowtimePlaylist = time();
                                                                        $streamData = ipTV_stream::StreamContentData($stream_id, $takeCache, $prioritySource);
                                                                        do {
                                                                        } while ($playlistFileNew != $playlistFile);
                                                                        die;
                                                                        $ipTV_db->query('UPDATE `streams_sys` SET `monitor_pid` = \'%d\' WHERE `server_stream_id` = \'%d\'', getmypid(), $streamsSys['server_stream_id']);
                                                                    }
                                                                } while (!$sourceArg);
                                                                $sources = json_decode($streamsSys['stream_source'], true);
                                                                $takeCache = RESTART_TAKE_CACHE + 1;
                                                            }
                                                        }
                                                    } else {
                                                        $playlistFileNew = md5_file($playlist);
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
?>
