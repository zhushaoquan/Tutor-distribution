#include<gtk/gtk.h> 
#include <sys/types.h> 
#include <sys/socket.h>                         
#include <stdio.h> 
#include <netinet/in.h>                         
#include <arpa/inet.h>                         
#include <unistd.h> 
#define PORT 3339 
static GtkWidget *entry; 
void on_button_clicked(GtkButton *button,gpointer data) //设置按钮的触发事件
{ 
    const gchar *str; 
     int sockfd;                                 
   int len;                                     
   struct sockaddr_in addr;                 
   int newsockfd; 
   char buf[256]="Come on!"; 
   int len2;                             
   char rebuf[256]; 
   char IP_ADDR[100]; 
    str=gtk_entry_get_text(GTK_ENTRY(entry)); //获得输入的字符串
    sprintf(IP_ADDR,"%s",str); //将所要访问的IP地址赋值成输入的字符串
        sockfd = socket(AF_INET,SOCK_STREAM, 0);//一直到while（1）都是端口设置  
   addr.sin_family = AF_INET;             
   addr.sin_addr.s_addr=inet_addr(IP_ADDR);    
   addr.sin_port = PORT;                                 
   len = sizeof(addr); 
   newsockfd = connect(sockfd, (struct sockaddr *) &addr, len);     
   len2=sizeof(buf); 
while(1)//用于接收服务器端的消息和发送自己输入的消息
{ 
    printf("Please input your information:"); 
    gets(buf); 
    send(sockfd,buf,len2,0); 
    if(recv(sockfd,rebuf,256,0)>0) 
    { 
    printf("Information from server:\n%s\n",rebuf);     
    } 
} 
   close(sockfd);    
} 
void close_application(GtkWidget *widget,gpointer data) //设置窗口的功能
{ 
        gtk_main_quit(); 
} 
int main(int argc,char *argv[]) 
{ 
    GtkWidget *window; 
    GtkWidget *hbox; 
    GtkWidget *label; 
    GtkWidget *button; 
    gtk_init(&argc,&argv); 
    window=gtk_window_new(GTK_WINDOW_TOPLEVEL); //设置窗口的功能、名称等
    g_signal_connect (G_OBJECT (window), "destroy", 
                    G_CALLBACK (close_application), 
                    NULL); 
    gtk_window_set_title (GTK_WINDOW (window), "Client"); 
    gtk_window_set_position(GTK_WINDOW(window),GTK_WIN_POS_CENTER); //设置窗口功能、名称等
    hbox=gtk_hbox_new(FALSE,0); //创建存放空间的hbox
    gtk_container_add(GTK_CONTAINER(window),hbox); //将hbox加入到Window里
    label=gtk_label_new("Please input the IP:"); //标签内容
    gtk_box_pack_start(GTK_BOX(hbox),label,FALSE,FALSE,5); //把标签加入到hbox里
    entry=gtk_entry_new(); 
    gtk_box_pack_start(GTK_BOX(hbox),entry,TRUE,TRUE,5); 
    button=gtk_button_new_with_label("Link"); 
    g_signal_connect(G_OBJECT(button),"clicked",G_CALLBACK(on_button_clicked),NULL);//将触发事件与button连接 
    gtk_box_pack_start(GTK_BOX(hbox),button,FALSE,FALSE,5); 
    gtk_widget_show_all(window); 
    gtk_main(); 
    return 0; 
}