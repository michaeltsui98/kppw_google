/**
 * �����¼�����
 * 
 */

$(function() {
	var loading = parseInt($(".process li.selected").index()) + 1;
	$(".progress_bar").css("width", loading * 20 + "%");
	if (task_status == 9) {
		$(".progress_bar").css({
			width : "100%",
			background : "grey"
		});
	}
})

/** ����ύ */
function workHand() {
	if (check_user_login()) {
		if (uid == guid) {
			showDialog(L.operation_invalid+','+L.released_task_turnaround, 'alert', L.operation_failed_tips, '', 0);
			return false;
		} else {
			showWindow("work_hand", basic_url + '&op=work_hand', "get", '0');
			return false;
		}
	}
}
/**
 * �������ͶƱ
 * 
 * @param int
 *            work_id ������
 * @param int
 *            vote_uid ��ͶƱ��
 */
function workVote(work_id, vote_uid) {
	if (check_user_login()) {
		if (vote_uid == uid) {
			showDialog(L.t_vote_forbidden, 'alert', L.operate_notice);
			return false;
		}
		var url = basic_url + '&op=work_vote';
		$.post(url, {
			work_id : work_id
		}, function(json) {
			if (json.status == 1) {
				$("#work_vote_" + work_id).remove();
				var vote_num = $("#vote_num_" + work_id).html();
				num = parseInt(vote_num) + 1;
				$("#vote_num_" + work_id).html(num);
				showDialog(json.data, 'right', json.msg);
				return false;
			} else
				showDialog(json.data, 'alert', json.msg);
			return false;
		}, 'json')
	}
}
/**
 * ѡ����
 * 
 * @param work_id
 *            ������
 * @param to_status
 *            ���״̬
 * @returns {Boolean}
 */

function workBid(work_id, to_status) {
	if (check_user_login()) {
		if (guid != uid) {
			showDialog(L.t_master_can_operate_work, "alert", L.operate_notice);
			return false;
		} else {
			var url = basic_url + '&op=work_choose&work_id=' + work_id;
			$.post(url, {
				to_status : to_status
			}, function(json) {
				if (json.status == 1) {
					showDialog(json.data, "right", json.msg,"location.href='" + basic_url + "&view=work'");
				} else {
					showDialog(json.data, "alert", json.msg);
					return false;
				}
			}, 'json')
		}
	}
}
/**
 * ������ת
 * 
 * @param agree_id
 *            Э����
 */
function taskAgree(agree_id) {
	if (check_user_login()) {
		location.href = "index.php?do=agreement&task_id=" + task_id
				+ "&agree_id=" + agree_id;
	}
}