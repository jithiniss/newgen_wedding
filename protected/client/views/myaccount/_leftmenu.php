<div class="col-md-3 newgens short">
        <h3>Inbox</h3>
        <ul class="list-unstyled">
                <li><?php echo CHtml::link('Message', array('Myaccount/Message')); ?></li>
                <li><?php echo CHtml::link('Invitations', array('Myaccount/Invitations')); ?></li>
                <li><?php echo CHtml::link('Photo Requests', array('Myaccount/PhotoRequests')); ?></li>

        </ul>
        <h3>Accepted</h3>
        <h3>Sent</h3>
        <ul class="list-unstyled">
                <li><?php echo CHtml::link('Message', array('Myaccount/Message')); ?></li>
                <li><?php echo CHtml::link('Invitations', array('Myaccount/SentInvitations')); ?></li>
        </ul>
        <h3>Quick Links</h3>
        <ul class="list-unstyled">
                <li><?php echo CHtml::link('Shortlists & more', array('Myaccount/Message')); ?></li>
                <li><?php echo CHtml::link('My Matches', array('Matches/MyMatches')); ?></li>
                <li><?php echo CHtml::link('Looking for Me', array('Matches/LookingMe')); ?></li>
                <li><?php echo CHtml::link('2-way Matches', array('Matches/TwoWayMatches')); ?></li>
                <li><?php echo CHtml::link('Profile Visitors', array('Matches/TwoWayMatches')); ?></li>
                <li><?php echo CHtml::link('Profile Visited', array('Myaccount/Message')); ?></li>
                <li><?php echo CHtml::link('Saved Searches', array('Myaccount/Message')); ?></li>

        </ul>

</div>