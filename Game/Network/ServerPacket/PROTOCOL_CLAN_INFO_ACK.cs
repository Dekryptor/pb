/*
 * C# Server Emulator Project Blackout / PointBlank
 * Authors: the__all
 * Copyright (C) 2015 | OZ-Network
 */
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using Core.Model;
using Core.Database.Tables;

namespace Game.Network.ServerPacket
{
    class PROTOCOL_CLAN_INFO_ACK : SendPacket
    {
        Player player;
        Clan clan;
        public PROTOCOL_CLAN_INFO_ACK(Player player)
        {
            this.player = player;
            this.clan = player.Clan;
        }
        public override void WriteImpl()
        {
            Player player = PlayersTable.players[clan.OwnerId];
            WriteH(0x51F);
            WriteD(1);
            WriteC(0x60);
            WriteC(0x41);
            WriteH(1);
            WriteS(clan.Name, Clan.CLAN_NAME_SIZE);
            WriteC((byte)clan.Rank);
            WriteC((byte)clan.PlayersCount); // кол-во человек в клане
            WriteC((byte)clan.MaxPlayersCount); // макс кол-во человек в клане
            WriteB(new byte[] { 0x32, 0x4b, 0x05, 0x33, 0x01 });
            WriteC((byte)clan.Logo1); // Logo 1
            WriteC((byte)clan.Logo2); // Logo 2
            WriteC((byte)clan.Logo3); // Logo 3
            WriteC((byte)clan.Logo4); // Logo 4
            WriteC((byte)clan.Color); // Clan color
            WriteD(clan.Exp);
            WriteB(new byte[12]);
            WriteS(player.PlayerName, 33); //лидер клана
            WriteC(0); // Разделитель
            WriteS(clan.Info, 280);
            WriteS(clan.Notice, 255);

        }
    }
}
