node {
    checkout scm
    // Tahap Build
    stage ("Build") {
        docker.image('shippingdocker/php-composer:7.4').inside('-u root') {
            sh 'rm composer.lock'
            sh 'composer install'
        }
    }
    // Tahap Testing
    stage ("Testing") {
        docker.image('ubuntu').inside('-u root') {
            sh 'echo "Ini adalah test"'
        }
    }
    // Tahap Deploy ke Produksi
    stage ("Deploy") {
        docker.image('agung3wi/alpine-rsync:1.1').inside('-u root') {
            sshagent (credentials: ['ssh-prod']) {
                sh 'mkdir -p ~/.ssh'
                sh 'ssh-keyscan -H "$PROD_HOST" > ~/.ssh/known_hosts'
                sh "rsync -rav --delete ./ ubuntu@$PROD_HOST:/home/ubuntu/prod.kelasdevops.xyz/ --exclude=.env --exclude=storage --exclude=.git"
            }
        }
    }
}